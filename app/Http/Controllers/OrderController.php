<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\TypepaperRepository;
use App\Repositories\TypeformatRepository;
use App\Repositories\WordpageRepository;
use App\Repositories\AcademiclevelRepository;
use App\Repositories\DeadlineRepository;
use App\Repositories\UserslevelRepository;
use App\Repositories\ExtratserviceRepository;
use App\Repositories\TypeofworksRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\StandarddeadlineRepository;
use App\Repositories\PayRepository;
use App\Repositories\StructureRepository;
use App\Repositories\UserRepository;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Order;
use App\Models\Deadline;
use App\Models\Bonreduction;
use App\Models\File;
use App\Models\Structure;
use App\Models\Historique;
use App\Models\Solde;
use Braintree\ClientToken;
use Braintree\Transaction;
use App\Mail\OrderConfirmation;
use App\Mail\PaymentConfirmation;
use App\Mail\NewOrderMail;
use Illuminate\Support\Facades\Mail;
//use Srmklive\PayPal\Services\ExpressCheckout;


class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;
    private $typepaperRepository;
    private $typeformatRepository;
    private $wordpageRepository;
    private $academiclevelRepository;
    private $deadlineRepository;
    private $userslevelRepository;
    private $extratserviceRepository;
    private $typeofworksRepository;
    private $subjectRepository;
    private $standarddeadlineRepository;
    private $payRepository;
    private $structureRepository;
    private $userRepository;

    public function __construct(
        OrderRepository $orderRepo,
        TypepaperRepository $typepaperRepository,
        TypeformatRepository $typeformatRepository,
        WordpageRepository $wordpageRepository,
        AcademiclevelRepository $academiclevelRepository,
        DeadlineRepository $deadlineRepository,
        UserslevelRepository $userslevelRepository,
        ExtratserviceRepository $extratserviceRepository,
        TypeofworksRepository $typeofworksRepository,
        SubjectRepository $subjectRepository,
        StandarddeadlineRepository $standarddeadlineRepository,
        PayRepository $payRepository,
        UserRepository $userRepository,
        StructureRepository $structureRepository

    )
    {
        $this->orderRepository = $orderRepo;
        $this->typepaperRepository = $typepaperRepository;
        $this->typeformatRepository = $typeformatRepository;
        $this->wordpageRepository = $wordpageRepository;
        $this->academiclevelRepository = $academiclevelRepository;
        $this->deadlineRepository = $deadlineRepository;
        $this->userslevelRepository = $userslevelRepository;
        $this->extratserviceRepository = $extratserviceRepository;
        $this->typeofworksRepository =  $typeofworksRepository;
        $this->subjectRepository =  $subjectRepository;
        $this->standarddeadlineRepository =  $standarddeadlineRepository;
        $this->payRepository =  $payRepository;
        $this->structureRepository =  $structureRepository;
        $this->userRepository =  $userRepository;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orderRepository->pushCriteria(new RequestCriteria($request));
        $orders = $this->orderRepository->all();

        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        $order = $this->orderRepository->create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param  int              $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }

    public function showForm(){

        $users = \App\Models\User::where('role_id', 1)->orderBy('id', 'desc')->get();
        return view('orders.orderForm')
            ->with('typepapers', $this->typepaperRepository->all())
            ->with('typeformats', $this->typeformatRepository->all())
            ->with('wordpages', $this->wordpageRepository->all())
            ->with('academiclevels', $this->academiclevelRepository->all())
            ->with('deadlines', $this->deadlineRepository->all())
            ->with('userslevels', $this->userslevelRepository->all())
            ->with('extratservices', $this->extratserviceRepository->all())
            ->with('typeofworks', $this->typeofworksRepository->all())
            ->with('subjects', $this->subjectRepository->all())
            ->with('standarddeadlines', $this->standarddeadlineRepository->all())
            ->with('pays', $this->payRepository->all())
            ->with('users', $users)
            ->with('structure', $this->structureRepository->all())
            ;
    }



    public function saveOrder(Request $request){

        $tructure = Structure::find(1);
        $dl = Deadline::where('academiclevel_id', $request->academiclevel_id)->where('standarddeadline_id', $request->deadline_id)->first();
        $br = Bonreduction::where('code', $request->bonreduction)->first();
        if($dl) {
            $myOrder = new Order();
            $myOrder->typepapers_id = $request->typeofpaper_id;
            $myOrder->subject_id = $request->subject_id;
            $myOrder->typeformat_id = $request->typeformat_id;
            $myOrder->wordpage_id = $request->wordpage_id;
            $myOrder->deadline_id = $dl->id;
            $myOrder->userslevel_id = $request->userslevel_id;
            if(isset($request->extratservice_id) && !is_null($request->extratservice_id) && count($request->extratservice_id) > 0) {
                $myOrder->extratservice_id = implode(";", $request->extratservice_id);
            }
            if($br) {
                $myOrder->bonreduction_id = $br->id;
            }
            $myOrder->etat = 'BIDDING';
            $myOrder->typeofwork_id = $request->typeofwork_id;
            $myOrder->number_of_page = $request->number_of_page;
            $myOrder->topic = $request->topic;
            $myOrder->description = $request->description;
            $myOrder->source = $request->source;
            if(!$request->has('is_admin_record')){
                $myOrder->user_id = auth()->user()->id;
            }else{
                $myOrder->user_id = $request->user_id;
            }
            $myOrder->ref = auth()->user()->id;
            $myOrder->is_premium = $request->premium_mode == 1;


            $myOrder->calculerMontant();

            $myOrder->save();
            $myOrder->ref = "OR".sprintf("%05d", $myOrder->id);
            $myOrder->save();

            $request->session()->put('order_id', $myOrder->id);

            if(count($request->file()) > 0) {
                $files = $request->file('files');
                foreach($files as $file) {
                    $destinationPath = 'filesOrders/dossierOrder' . $myOrder->id;
                    if (!is_dir($destinationPath))
                        mkdir($destinationPath, 0777, true);

                    $ext = pathinfo(storage_path() . '/' . $file->getClientOriginalName(), PATHINFO_EXTENSION);
                    $type = strtolower($ext);
                    $nomfichier = uniqid() . "." . $ext;
                    $file->move($destinationPath, $nomfichier);

                    $fichier = new \App\Models\File();
                    $fichier->order_id = $myOrder->id;
                    $fichier->user_id = auth()->user()->id;
                    $fichier->is_user_sender = true;
                    $fichier->nom = $file->getClientOriginalName();
                    $fichier->physical_name = $nomfichier;
                    $fichier->type = $type;
                    $fichier->emplacement = $destinationPath;
                    $fichier->save();
                }

                //$cour->save();
            }

            $amount = floatval(number_format((float)($myOrder->montant * $tructure->activation_order_price)/100, 2, '.', ''));


            if(!$request->has('is_admin_record')){
                $sld = Solde::where('user_id', auth()->user()->id)->first();
            }else{
                $sld = Solde::where('user_id', $request->user_id)->first();
            }
            if(!$sld){
                $sld = new Solde();
                if(!$request->has('is_admin_record')){
                    $sld->user_id = auth()->user()->id;
                }else{
                    $sld->user_id = $request->user_id;
                }
                $sld->montant_utile = 0;
            }
            $sld->montant_utile -= $myOrder->montant;
            $sld->save();







            /*
            // To use adaptive payments.
            $provider = new ExpressCheckout;

            $data['items'] = [
                [
                    'name' => "Order PaperWeight",
                    'price' => $amount,
                    'qty' => 1
                ]
            ];

            $data['invoice_id'] = strtoupper(substr(uniqid() , 0, 6));
            $data['invoice_description'] = "You must pay ".$tructure->activation_order_price."% of the amount of your order for it to be activated.";
            $data['return_url'] = url('/payment/success');
            $data['cancel_url'] = url('/payment/error');
            $data['total'] = $amount;

            $response = $provider->setExpressCheckout($data);

            $request->session()->put('data', $data);
            $request->session()->put('from', 'order');
            $request->session()->put('token_paypal', $response['TOKEN']);
            $request->session()->put('amount', $amount);
            $request->session()->put('historique', $tructure->activation_order_price."% fees of the amount of your order for it to be activated.");

            //return redirect($response['paypal_link']);
            */

            //OrderConfirmation
            if(!$request->has('is_admin_record')){
                Mail::to(auth()->user()->email)->send(new OrderConfirmation($myOrder));
                $this->sendMailToAdmin($myOrder);
                $myOrder->user_id = auth()->user()->id;
            }else{

                $this->sendMailToAdmin($myOrder);
                $user = $this->userRepository->findWithoutFail($request->user_id);
                if(!empty($user)){
                    Mail::to($user->email)->send(new OrderConfirmation($myOrder));
                }
            }

            return redirect(route('view-detail-order', $myOrder->id));
        }


    }

    public function sendMailToAdmin($order){
        $admins = \App\User::where('role_id',3)->get();
        foreach($admins as $ad){
            Mail::to($ad->email)->send(new NewOrderMail($order));
        }

    }


    public function uploadFile(Request $request) {

        $result = array();
        $result['status'] = 0;
        if(count($request->file()) > 0) {
            $files = $request->file('fichiers');

            $result['status'] = 1;
            $result['files'] = array();
            foreach($files as $file) {
                $destinationPath = 'filesOrders/dossierUser' . $request->file_user_id;
                if (!is_dir($destinationPath))
                    mkdir($destinationPath, 0777, true);

                $ext = pathinfo(storage_path() . '/' . $file->getClientOriginalName(), PATHINFO_EXTENSION);
                $type = strtolower($ext);
                $nomfichier = uniqid() . "." . $ext;
                $file->move($destinationPath, $nomfichier);

                $fichier = new \App\Models\File();
                $fichier->user_id = $request->file_user_id;
                $fichier->admin_id = ($request->file_admin_id > 0) ? $request->file_admin_id : null;
                $fichier->is_user_sender = ($request->is_user == 1);
                $fichier->nom = $file->getClientOriginalName();
                $fichier->physical_name = $nomfichier;
                $fichier->type = $type;
                $fichier->emplacement = $destinationPath;
                $fichier->save();
                $result['files'][] = [
                    'url' => asset($fichier->emplacement.'/'.$fichier->physical_name),
                    'class' => ($fichier->iAmSender($request->file_user_id) ? '' : 'admin'),
                    'nom' => $fichier->nom,
                    'proprietaire' => ($fichier->iAmSender($request->file_user_id) ? $fichier->user->name : 'admin : '.$fichier->admin->name),
                ];
            }

            //$cour->save();
        }


        return response()->json($result);

    }

    public function viewDetailOrder($id) {
        $order = $this->orderRepository->findWithoutFail($id);
        $struc = $this->structureRepository->findWithoutFail(1);

        if (empty($order)) {
            Flash::error('we can not show this order : Order not found');

            return redirect(route('order'));
        }


        return view('orders.viewInfoOrder')
            ->with('order', $order)
            ->with('struc', $struc)
            ->with('typepapers', $this->typepaperRepository->all())
            ->with('wordpages', $this->wordpageRepository->all())
            ->with('academiclevels', $this->academiclevelRepository->all())
            ->with('deadlines', $this->deadlineRepository->all())
            ->with('typeofworks', $this->typeofworksRepository->all())
            ->with('structure', $this->structureRepository->all())
            ->with('standarddeadlines', $this->standarddeadlineRepository->all())

            ;

    }


    public function retourPayalSuccess(Request $request) {

        if($request->session()->get('order_id') != '0')
            $order = Order::find($request->session()->get('order_id'));

        $provider = new ExpressCheckout;

        $token = $request->session()->get('token_paypal');
        $response = $provider->getExpressCheckoutDetails($token);

        $data = $request->session()->get('data');
        $response = $provider->doExpressCheckoutPayment($data, $response['TOKEN'], $response['PAYERID']);


        //var_dump($response);
        //die();



        if ($response['ACK'] == 'SuccessWithWarning' || $response['ACK'] == 'Success' ) { //le paiement s'est bien passé
            $ht = new Historique();
            $ht->user_id = auth()->user()->id;
            $ht->description = $request->session()->get('historique');
            $ht->montant = floatval($request->session()->get('amount'));
            $ht->save();

            Mail::to(auth()->user()->email)->send(new PaymentConfirmation($ht->montant));

            $sld = Solde::where('user_id', auth()->user()->id)->first();
            if(!$sld){
                $sld = new Solde();
                $sld->user_id = auth()->user()->id;
                $sld->montant_utile = 0;
            }
            $sld->montant_utile += floatval($request->session()->get('amount'));
            $sld->save();

            if(isset($order) && $order){
                $order->active = true;
                $order->montant_payer = $order->montant_payer + floatval($request->session()->get('amount'));
                $order->save();
            }


            Flash::success('success payment');
            return redirect(route('home'));
        } else {

            Flash::success('an error occurred during the payment');
            if($request->session()->get('from') == 'order')
                if(isset($order) && $order)
                    return redirect(route('order'))->with('order', $order);
                else
                    return redirect(route('order'));

            else
                return redirect(route('home'));
        }

    }

    public function retourPayalError(Request $request) {
        echo "error";

    }


    public function seeOrder($id) {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('we can not show this order : Order not found');

            return redirect(route('Home'));
        }


        return view('orders.seeOrder')->with('order', $order);

    }

    public function payForOrder($amount, $max_amount) {

        return view('soldes.payForm')
            ->with('amount', floatval(number_format((float)$amount, 2, '.', '')))
            ->with('nomenu', true)
            ->with('max_amount', floatval(number_format((float)$max_amount, 2, '.', '')))
            ->with('braintreeToken', ClientToken::generate())
            ;

    }

    public function receivePaymentNonce(Request $request) {

        /*$nonceFromTheClient = $request->nonce;
        $result = Transaction::sale([
            'amount' => ''.floatval(number_format((float)$request->amount, 2, '.', '')),
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);
        if($result->success){*/

            $ht = new Historique();
            $ht->user_id = auth()->user()->id;
            $ht->description = 'bill payment for your orders ';
            $ht->montant = floatval(number_format((float)$request->amount, 2, '.', ''));
            $ht->save();

            $sld = Solde::where('user_id', auth()->user()->id)->first();
            if(!$sld){
                $sld = new Solde();
                $sld->user_id = auth()->user()->id;
                $sld->montant_utile = -floatval(number_format((float)$request->amount, 2, '.', ''));
            }
            $sld->montant_utile = $sld->montant_utile + floatval(number_format((float)$request->amount, 2, '.', ''));

            $sld->save();

            if(isset($order) && $order){
                $order->active = true;
                $order->montant_payer = $order->montant_payer + floatval(number_format((float)$request->amount, 2, '.', ''));
                $order->save();
            }

            Mail::to(auth()->user()->email)->send(new PaymentConfirmation($ht->montant));

            $result = array();
            $result['statu'] = 1;
            return response()->json($result);

        /*}else{
            $result = array();
            $result['statu'] = 0;
            return response()->json($result);

        }*/


    }
    public function makePaymentForOrder(Request $request) {

        $tructure = Structure::find(1);
        //$order = $this->orderRepository->findWithoutFail($request->order_id);



        $amount = floatval(number_format((float)$request->amount, 2, '.', ''));
        // To use adaptive payments.
        $provider = new ExpressCheckout;
        //$provider = PayPal::setProvider('express_checkout');

        $data['items'] = [
            [
                'name' => "Order PaperWeight",
                'price' => $amount,
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = strtoupper(substr(uniqid() , 0, 6)); //$order->id;
        $data['invoice_description'] = "This payment is for your order ";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/payment/error');
        $data['total'] = $amount;

        $response = $provider->setExpressCheckout($data);

        //var_dump($response);
        //die();

        $request->session()->put('data', $data);
        $request->session()->put('token_paypal', $response['TOKEN']);
        $request->session()->put('amount', $amount);
        $request->session()->put('historique', "bill payment for your orders ");
        $request->session()->put('order_id', 0);
        $request->session()->put('from', 'home');

        //var_dump($response);
        //die();

        return redirect($response['paypal_link']);



    }



    public function myOrder(Request $request) {

        return view('users.myOrders')->with('menu', 1);

    }
    public function myPayments(Request $request) {

        return view('users.myPayment')->with('menu', 3);

    }
    public function myMessages(Request $request) {

        return view('users.myMessages')->with('menu', 4);

    }
    public function formNoter(Request $request) {

        return view('users.myMessages')->with('menu', 4);

    }
    public function changeStatus(Request $request) {

        $order = $this->orderRepository->findWithoutFail($request->order_id);
        $result = array();
        if (empty($order)) {
            $result['statu'] = 0;
            return response()->json($result);
        }
        $result['statu'] = 1;
        $order->etat = $request->etat;
        $order->save();
        $result['valeur'] = $order->etat();

        return response()->json($result);
    }

}
