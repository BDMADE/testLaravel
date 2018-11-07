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
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\StructureRepository;
use App\Repositories\BonreductionRepository;
use App\Repositories\TermRepository;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pays;
use App\Models\Order;
use App\Models\Solde;
use App\Models\Role;
use App\Models\Typepaper;
use App\Models\Subject;
use App\Models\StandardDeadline;
use App\Models\Typeformat;
use App\Models\Typeofwork;
use App\Models\Wordpage;
use App\Models\Academiclevel;
use App\Models\Deadline;
use App\Models\Bonreduction;

use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
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
    private $roleRepository;
    private $userRepository;
    private $structureRepository;
    private $bonreductionRepository;
    private $termRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        RoleRepository $roleRepository,
        UserRepository $userRepository,
        StructureRepository $structureRepository,
        BonreductionRepository $bonreductionRepository,
        TermRepository $termRepository

    )
    {
        //$this->middleware('auth');
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
        $this->roleRepository =  $roleRepository;
        $this->userRepository =  $userRepository;
        $this->structureRepository =  $structureRepository;
        $this->bonreductionRepository =  $bonreductionRepository;
        $this->termRepository =  $termRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sld = Solde::where('user_id', auth()->user()->id)->first();
        if(!$sld){
            $sld = new Solde();
            $sld->user_id = auth()->user()->id;
            $sld->montant_utile = 0;
            $sld->save();
        }

        
        if(is_null(auth()->user()->role_id)){
            $user = auth()->user();
            $user->role_id = 1;
            $user->save();
        }


        $orders_sort = Order::join('deadlines', 'orders.deadline_id', '=', 'deadlines.id')
            ->join('standarddeadlines', 'deadlines.standarddeadline_id', '=', 'standarddeadlines.id')
            ->select('orders.*', 'standarddeadlines.nb_days')
            ->groupBy('orders.id')
            ->orderBy('standarddeadlines.nb_days', 'asc')
            ->get();

        //dd($orders_sort->toarray());

        //$orders_sort = $this->orderRepository->all();

        if(auth()->user()->role->slug == "superadmin" || auth()->user()->role->slug == "admin") {
            return view('users.Admin.homeAdmin')
                ->with('orders', $this->orderRepository->all())
                ->with('orders_sort', $orders_sort);
        }else
            return view('home');


    }


    public function accueil()
    {
        return view('front.accueil')
            ->with('typepapers', $this->typepaperRepository->all())
            ->with('wordpages', $this->wordpageRepository->all())
            ->with('academiclevels', $this->academiclevelRepository->all())
            ->with('deadlines', $this->deadlineRepository->all())
            ->with('typeofworks', $this->typeofworksRepository->all())
            ->with('structure', $this->structureRepository->all())
            ->with('standarddeadlines', $this->standarddeadlineRepository->all());
    }

    public function term()
    {
        return view('term')
            ->with('typepapers', $this->typepaperRepository->all())
            ->with('wordpages', $this->wordpageRepository->all())
            ->with('academiclevels', $this->academiclevelRepository->all())
            ->with('deadlines', $this->deadlineRepository->all())
            ->with('typeofworks', $this->typeofworksRepository->all())
            ->with('structure', $this->structureRepository->all())
            ->with('standarddeadlines', $this->standarddeadlineRepository->all())
            ->with('terms', $this->termRepository->all());
    }

    public function modifyTerm()
    {
        return view('users.Admin.term')->with('menu', 8)
            ->with('terms', $this->termRepository->all());
    }

    public function saveTerm(Request $request)
    {
        $term = $this->termRepository->findWithoutFail(1);
        if (empty($term)) {
            $term = new \App\Models\Term();
        }
        $term->content = $request->term;
        $term->save();
        return redirect(route('edit-term'));
    }


    /*************** manag user *************************************************************/

    public function managUser()
    {
        return view('users.Admin.managUser')->with('roles', $this->roleRepository->all())->with('menu', 1);
    }
    public function listOrder()
    {
        $orders_sort = Order::join('deadlines', 'orders.deadline_id', '=', 'deadlines.id')
            ->join('standarddeadlines', 'deadlines.standarddeadline_id', '=', 'standarddeadlines.id')
            ->select('orders.*', 'standarddeadlines.nb_days')
            ->groupBy('orders.id')
            ->orderBy('standarddeadlines.nb_days', 'asc')
            ->get();
        return view('users.Admin.homeAdmin')
            ->with('orders', $this->orderRepository->all())->with('menu', 3)
            ->with('orders_sort', $orders_sort);
    }

    public function changeRole(Request $request) {

        $user = $this->userRepository->findWithoutFail($request->user_id);
        $result = array();
        if (empty($user)) {
            $result['statu'] = 0;
            return response()->json($result);
        }
        $user->role_id = $request->role_id;
        $user->save();

        $result['statu'] = 1;
        $result['role_name'] = $user->role->name;
        $result['role_slug'] = $user->role->slug;
        $result['role_id'] = $user->role->id;

        return response()->json($result);
    }

    public function editUserForm($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('home'));
        }
        return view('users.Admin.editUser')
            ->with('usr', $user)
            ->with('nemu', 1)
            ->with('orders', $this->orderRepository->all())
            ->with('roles', $this->roleRepository->all())
            ->with('pays', $this->payRepository->all())
            ;
    }


    public function saveProfileAdmin(Request $request) {

        $user = $this->userRepository->findWithoutFail($request->user_id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('manag-user'));
        }


        if(count($request->file()) > 0) {
            $file = $request->file('file');
            $destinationPath = 'images/avatars/';
            if (!is_dir($destinationPath))
                mkdir($destinationPath, 0777, true);

            $ext = strtolower(pathinfo(storage_path() . '/' . $file->getClientOriginalName(), PATHINFO_EXTENSION));
            $nomfichier = uniqid() . "." . $ext;
            $file->move($destinationPath, $nomfichier);
            $user->avatar = $nomfichier;

        }

        $user->login = $request->login;
        $user->name = $request->name;
        $user->tel1 = $request->tel1;
        $user->tel2 = $request->tel2;
        $user->role_id = $request->role_id;
        $user->pay_id = $request->pay_id;
        $user->save();


        return redirect(route('manag-user'));

    }

    public function ManagePriceView(Request $request)
    {
        //Deadline
        //StandardDeadline
        //Academiclevel
        $als = $this->academiclevelRepository->all();
        $data = array();
        $data3 = array();
        $data2 = array();
        $stdl = array();
        if(!empty($als)){
            $k = 0;
            $cpt = 0;
            foreach($als as $al){
                $data2[$k] = array();
                $data2[$k][0] = $al->id;
                $data2[$k][1] = $al->nom;
                $dls = Deadline::where('academiclevel_id', $al->id)->get();
                $i = 0;
                $data[$cpt] = array();
                $data[$cpt + 1] = array();
                $ind = 0;
                foreach($dls as $dl){
                    if($ind < count($dls)){
                        $stdl[$ind] = $dl->deadline->nom;
                        $ind++;
                    }
                    $data[$cpt][$i][0] = $dl->prix_standard;
                    $data[$cpt + 1][$i][0] = $dl->prix_premium;
                    $data[$cpt][$i][1] = $dl->id;
                    $data[$cpt + 1][$i][1] = $dl->id;
                    $i++;
                }
                $k++;
                $cpt += 2;
            }


            $line = count($data);
            $col = ($line > 0)? count($data[0]) : 0;
            for($i = 0; $i < $col; $i++){
                $data3[$i] = array();
                for($j = 0; $j < $line; $j++){
                    $data3[$i][$j] = $data[$j][$i];
                }
            }
            //dd($data3);
        }



        return view('users.Admin.managPrice')->with('menu', 5)
            ->with('structure', $this->structureRepository->findWithoutFail(1)) //
            ->with('prices', $data3) //
            ->with('academiclevels', $data2) //
            ->with('deadline', $stdl) //
            ;
    }



    public function updatePrice(Request $request)
    {
        $tp = $this->deadlineRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }
        if($request->type == 'std')
            $tp->prix_standard = $request->val;
        else
            $tp->prix_premium = $request->val;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function updateStructure(Request $request)
    {
        $tp = $this->structureRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->activation_order_price = $request->val;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }




    public function ManageDiscount(Request $request)
    {


        return view('users.Admin.managDiscount')->with('menu', 4)
            ->with('reductions', $this->bonreductionRepository->all())
            ;
    }
    public function updateBon(Request $request)
    {
        $tp = $this->bonreductionRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->date_debut = $request->date_debut;
        $tp->date_fin = ($request->nb_jour_valide > 0) ? date('Y-m-d', strtotime($request->date_debut. ' + '.$request->nb_jour_valide.' days')) : $request->date_fin;
        $tp->prix_fixe = $request->prix_fixe;
        $tp->prix_percent = $request->prix_percent;
        $tp->nb_user_max = $request->nb_user_max;
        $tp->applique_prixfixe = $request->app;
        $tp->nb_user_utiliser = $request->nb_user_utiliser;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }


    public function addBon(Request $request)
    {
        $tp = new Bonreduction();
        if(!isset($request->code) || is_null($request->code) || $request->code == '')
            $tp->code = strtoupper(substr(uniqid(), 0, 9));
        else
            $tp->code = $request->code;
        $tp->date_debut = $request->date_debut;
        $tp->date_fin = $request->date_fin;
        $tp->prix_fixe = $request->prix_fixe;
        $tp->prix_percent = $request->prix_percent;
        $tp->nb_user_max = $request->nb_user_max;
        $tp->nb_user_utiliser = 0;
        $tp->applique_prixfixe = $request->app;
        $tp->nom = $request->nom;
        $tp->max_discount = $request->max_discount;
        $tp->min_spent = $request->min_spent;
        if($tp->save()){
            $result['statu'] = 1;
            $result['id'] = $tp->id;
            $result['code'] = $tp->code;
            $result['date_debut'] = $tp->date_debut->format('Y-m-d');
            $result['date_fin'] = $tp->date_fin->format('Y-m-d');
            $result['nb_jour_valide'] = $tp->nb_jour_valide;
            $result['prix_fixe'] = $tp->prix_fixe;
            $result['prix_percent'] = $tp->prix_percent;
            $result['nb_user_max'] = $tp->nb_user_max;
            $result['nb_user_utiliser'] = $tp->nb_user_utiliser;
            $result['applique_prixfixe'] = $tp->applique_prixfixe;
            return response()->json($result);
        }else{
            $result['statu'] = 0;
            return response()->json($result);
        }


    }

    public function deleteBon(Request $request)
    {
        $tp = $this->bonreductionRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }



    public function settingView(Request $request)
    {
        /*
         *
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
        $this->roleRepository =  $roleRepository;
        $this->userRepository =  $userRepository;
         */
        return view('users.Admin.setting')->with('menu', 6)
            ->with('typepapers', $this->typepaperRepository->all()) //
            ->with('typeformats', $this->typeformatRepository->all())//
            ->with('typeofworks', $this->typeofworksRepository->all())//
            ->with('wordpages', $this->wordpageRepository->all())//
            ->with('academiclevels', $this->academiclevelRepository->all())//
            ->with('userslevels', $this->userslevelRepository->all())
            ->with('extratservices', $this->extratserviceRepository->all())
            ->with('deadlines', $this->standarddeadlineRepository->all()) //
            ->with('subjects', $this->subjectRepository->all()) //
            ->with('structure', $this->structureRepository->all()) //
            ;
    }

    public function updateTypePaper(Request $request)
    {
        $tp = $this->typepaperRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addTypePaper(Request $request)
    {
        $tp = new Typepaper();
        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['url_delete'] = 'delete-typepaper';
        $result['url_update'] = 'update-typepaper';
        $result['loader_up'] = 'loader-tp-up_';
        $result['row_id'] = 'typepaper_row_'.$tp->id;
        $result['del_msg'] = 'paper type';
        $result['id'] = $tp->id;

        return response()->json($result);
    }

    public function deleteTypePaper(Request $request)
    {
        $tp = $this->typepaperRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }





    public function updateSubject(Request $request)
    {
        $tp = $this->subjectRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addSubject(Request $request)
    {
        $tp = new Subject();
        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['url_delete'] = 'delete-subject';
        $result['url_update'] = 'update-subject';
        $result['loader_up'] = 'loader-sj-up_';
        $result['row_id'] = 'subject_row_'.$tp->id;
        $result['del_msg'] = 'subject';
        $result['id'] = $tp->id;

        return response()->json($result);
    }

    public function deleteSubject(Request $request)
    {
        $tp = $this->subjectRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }








    public function updateStandardDeadline(Request $request)
    {
        $tp = $this->standarddeadlineRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->nb_days = $request->day;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addStandardDeadline(Request $request)
    {
        $tp = new StandardDeadline();
        $tp->nom = $request->val;
        $tp->nb_days = $request->day;
        $tp->save();
        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['day'] = $tp->nb_days;
        $result['url_delete'] = 'delete-deadline';
        $result['url_update'] = 'update-deadline';
        $result['loader_up'] = 'loader-dl-up_';
        $result['row_id'] = 'deadline_row_'.$tp->id;
        $result['del_msg'] = 'deadline';
        $result['id'] = $tp->id;
        $acls = Academiclevel::all();
        foreach($acls as $ac){
            $dl = new Deadline();
            $dl->academiclevel_id = $ac->id;
            $dl->standarddeadline_id = $tp->id;
            $dl->prix_standard = 0;
            $dl->prix_premium = 0;
            $dl->save();
        }

        return response()->json($result);
    }

    public function deleteStandardDeadline(Request $request)
    {
        $tp = $this->standarddeadlineRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }
        $dls = Deadline::where('standarddeadline_id', $tp->id)->get();
        foreach($dls as $dl){
            $dl->forceDelete();
        }
        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }









    public function updateTypeFormat(Request $request)
    {
        $tp = $this->typeformatRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addTypeFormat(Request $request)
    {
        $tp = new Typeformat();
        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['url_delete'] = 'delete-typeformat';
        $result['url_update'] = 'update-typeformat';
        $result['loader_up'] = 'loader-tf-up_';
        $result['row_id'] = 'typeformat_row_'.$tp->id;
        $result['del_msg'] = 'type of format';
        $result['id'] = $tp->id;

        return response()->json($result);
    }

    public function deleteTypeFormat(Request $request)
    {
        $tp = $this->typeformatRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }








    public function updateTypeOfWork(Request $request)
    {
        $tp = $this->typeofworksRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->prix_percent = $request->pp;
        $tp->prix_fixe = $request->pf;
        $tp->appliquer_prixfixe = $request->app;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addTypeOfWork(Request $request)
    {
        $tp = new Typeofwork();
        $tp->nom = $request->val;
        $tp->prix_percent = $request->pp;
        $tp->prix_fixe = $request->pf;
        $tp->appliquer_prixfixe = $request->app;
        $tp->save();

        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['prix_percent'] = $tp->prix_percent;
        $result['prix_fixe'] = $tp->prix_fixe;
        $result['appliquer_prixfixe'] = $tp->appliquer_prixfixe ? 1 : 0;
        $result['id'] = $tp->id;

        return response()->json($result);
    }

    public function deleteTypeOfWork(Request $request)
    {
        $tp = $this->typeofworksRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }









    public function updateWordPage(Request $request)
    {
        $tp = $this->wordpageRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->nb_word = $request->nb;
        $tp->percentage_price = $request->pp;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addWordPage(Request $request)
    {
        $tp = new Wordpage();
        $tp->nom = $request->val;
        $tp->nb_word = $request->nb;
        $tp->percentage_price = $request->pp;
        $tp->save();

        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['nb_word'] = $tp->nb_word;
        $result['percentage_price'] = $tp->percentage_price;
        $result['id'] = $tp->id;

        return response()->json($result);
    }

    public function deleteWordPage(Request $request)
    {
        $tp = $this->wordpageRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }




    public function updateAcademicLevel(Request $request)
    {
        $tp = $this->academiclevelRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;

        return response()->json($result);
    }

    public function addAcademicLevel(Request $request)
    {
        $tp = new Academiclevel();
        $tp->nom = $request->val;
        $tp->save();
        $result['statu'] = 1;
        $result['nom'] = $tp->nom;
        $result['url_delete'] = 'delete-academiclevel';
        $result['url_update'] = 'update-academiclevel';
        $result['loader_up'] = 'loader-al-up_';
        $result['row_id'] = 'academiclevel_row_'.$tp->id;
        $result['del_msg'] = 'academic level';
        $result['id'] = $tp->id;
        $sts = StandardDeadline::all();
        foreach($sts as $st){
            $dl = new Deadline();
            $dl->academiclevel_id = $tp->id ;
            $dl->standarddeadline_id = $st->id;
            $dl->prix_standard = 0;
            $dl->prix_premium = 0;
            $dl->save();
        }
        return response()->json($result);
    }

    public function deleteAcademicLevel(Request $request)
    {
        $tp = $this->academiclevelRepository->findWithoutFail($request->id);
        $result = array();
        if (empty($tp)) {
            $result['statu'] = 0;
            return response()->json($result);
        }

        $sts = Deadline::where('academiclevel_id', $tp->id)->get();
        foreach($sts as $st){
            $st->forceDelete();
        }
        $tp->forceDelete();
        $result['statu'] = 1;

        return response()->json($result);
    }




    public function seoView(Request $request)
    {
        return view('users.Admin.seo')
            ->with('menu', 7)
            ->with('structure', $this->structureRepository->all())
            ;
    }

    public function seoUpdate(Request $request)
    {
        $tp = $this->structureRepository->findWithoutFail($request->id);

        if (empty($tp)) {
            $tp = new \App\Models\Structure();
        }

        $tp->seo_description = $request->seo_description;
        $tp->seo_tag = $request->seo_tag;
        $tp->save();

        return redirect(route('seo-setting'));
    }






    public function viewBlog()
    {
        return view('front.blog')
            ->with('typepapers', $this->typepaperRepository->all())
            ->with('wordpages', $this->wordpageRepository->all())
            ->with('academiclevels', $this->academiclevelRepository->all())
            ->with('deadlines', $this->deadlineRepository->all())
            ->with('typeofworks', $this->typeofworksRepository->all())
            ->with('structure', $this->structureRepository->all())
            ->with('standarddeadlines', $this->standarddeadlineRepository->all())
            ;
    }



    public function newUser(Request $request)
    {
        $test =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        //dd($test);

        if (!$test->fails()){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => bcrypt($request->password),
            ]);

        }



        return back();
    }

    public function deleteUser(Request $request)
    {
        $user = \App\Models\User::findOrFail($request->user_id);

        $user->forceDelete();

        return back();
    }









}
