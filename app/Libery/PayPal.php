<?php
/**
 * Created by PhpStorm.
 * User: NCR
 * Date: 10/01/2018
 * Time: 13:26
 */

namespace App\Libery;




use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class PayPal
{

    public  $montant;
    public  $description;


    function __construct($montant, $description) {
        $this->montant = $montant;
        $this->description = $description;


    }

    // on construit les params
    private function paramPaypal()
    {
        $params = array(
            'METHOD' => 'SetExpressCheckout',
            'VERSION' => '119.0',
            'USER' => Config::get('app.userpaypal'),
            'SIGNATURE' => Config::get('app.signaturepaypal'),
            'PWD' => Config::get('app.passwordpaypal'),
            'RETURNURL' => URL::to('/retourPapal?s=' . Session::getId()),
            'CANCELURL' => URL::to('/retourPapal?s=' . Session::getId()),
            'SOLUTIONTYPE' => 'Sole',
            'LANDINGPAGE' => 'Billing',
            'USERSELECTEDFUNDINGSOURCE' => 'CreditCard',
            'L_PAYMENTREQUEST_0_NAME0' => Config::get('PAYMENTREQUEST_NAME'),
            'L_PAYMENTREQUEST_0_AMT0' => $this->montant,
            'L_PAYMENTREQUEST_0_QTY0' => 1,
            'PAYMENTREQUEST_0_AMT' => $this->montant,//montant total de la transaction
            'PAYMENTREQUEST_0_CURRENCYCODE' => Config::get('app.devise'),//devise de la transaction
            'PAYMENTREQUEST_0_ITEMAMT' => $this->montant,// montant total des article
            'PAYMENTREQUEST_0_SHIPPINGAMT' => 0,//le transport
            'PAYMENTREQUEST_0_TAXAMT' => 0,
            //item
            'L_PAYMENTREQUEST_0_NAME0' => $this->description,
            'L_PAYMENTREQUEST_0_DESC0' => $this->description,
            'L_PAYMENTREQUEST_0_AMT0' => $this->montant,
            'L_PAYMENTREQUEST_0_QTY0' => 1,
        );

        return $params;

    }

// en envoie la requete qui redirige le user vers paypal
    function paypal()
    {
        $curl = curl_init();
        $params = http_build_query($this->paramPaypal());
        $url = 'https://api-3t.paypal.com/nvp';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_VERBOSE, false);

        $response = curl_exec($curl);
        if (!$response) {
            return "KO;1"; // echec de paiement à l'etape 1
        }

        $responseArray = array();
        parse_str($response, $responseArray);
        curl_close($curl);
        //var_dump($this->paramPaypal());
        //dd($responseArray);
        if ($responseArray['ACK'] === 'Success') {
            // on garde les param pour les recuperer au retour
            Session::put('params', $this->paramPaypal());
            $token = $responseArray['TOKEN'];

            return Redirect::away('https://www.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=' . $token);
        } else {
            return "KO;2"; // echec de paiement à l'etape 1
        }


    }

// une fois le paiement effectué ou annulé, on arrive ici
    function retourPayal(Request $request)
    {
        $payer_id = $request->PayerID;
        $token = $request->token;


        if (isset($token) && isset($payer_id)) {
            Session::setId($request->s);
            Session::start();
            $params = Session::get('params');
            $params['METHOD'] = 'DoExpressCheckoutPayment';
            $params['TOKEN'] = urlencode($token);
            $params['PAYERID'] = urlencode($payer_id);
            $params['PAYMENTREQUEST_0_PAYMENTACTION'] = 'Sale';
            $params = http_build_query($params);
            $curl = curl_init();
            $url = 'https://api-3t.paypal.com/nvp';
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_VERBOSE, false);

            $response = curl_exec($curl);
            curl_close($curl);
            $responseArray = array();
            parse_str($response, $responseArray);
            if (isset($token) && isset($payer_id) && $responseArray['ACK'] == 'Success') { //le paiement s'est bien passé
                return "OK;OK";  // tout s'est bien passeé
            } else {
                return "KO;3"; // echec
            }
        } else {
            return "KO;4"; // echec
        }
    }



}