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

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DeadlineController extends AppBaseController
{
    /** @var  DeadlineRepository */
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
        BonreductionRepository $bonreductionRepository

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
    }

    /**
     * Display a listing of the Deadline.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deadlineRepository->pushCriteria(new RequestCriteria($request));
        $deadlines = $this->deadlineRepository->all();

        return view('deadlines.index')
            ->with('deadlines', $deadlines);
    }

    /**
     * Show the form for creating a new Deadline.
     *
     * @return Response
     */
    public function create()
    {
        return view('deadlines.create');
    }

    /**
     * Store a newly created Deadline in storage.
     *
     * @param CreateDeadlineRequest $request
     *
     * @return Response
     */
    public function store(CreateDeadlineRequest $request)
    {
        $input = $request->all();

        $deadline = $this->deadlineRepository->create($input);

        Flash::success('Deadline saved successfully.');

        return redirect(route('deadlines.index'));
    }

    /**
     * Display the specified Deadline.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deadline = $this->deadlineRepository->findWithoutFail($id);

        if (empty($deadline)) {
            Flash::error('Deadline not found');

            return redirect(route('deadlines.index'));
        }

        return view('deadlines.show')->with('deadline', $deadline);
    }

    /**
     * Show the form for editing the specified Deadline.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deadline = $this->deadlineRepository->findWithoutFail($id);

        if (empty($deadline)) {
            Flash::error('Deadline not found');

            return redirect(route('deadlines.index'));
        }

        return view('deadlines.edit')->with('deadline', $deadline);
    }

    /**
     * Update the specified Deadline in storage.
     *
     * @param  int              $id
     * @param UpdateDeadlineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeadlineRequest $request)
    {
        $deadline = $this->deadlineRepository->findWithoutFail($id);

        if (empty($deadline)) {
            Flash::error('Deadline not found');

            return redirect(route('deadlines.index'));
        }

        $deadline = $this->deadlineRepository->update($request->all(), $id);

        Flash::success('Deadline updated successfully.');

        return redirect(route('deadlines.index'));
    }

    /**
     * Remove the specified Deadline from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deadline = $this->deadlineRepository->findWithoutFail($id);

        if (empty($deadline)) {
            Flash::error('Deadline not found');

            return redirect(route('deadlines.index'));
        }

        $this->deadlineRepository->delete($id);

        Flash::success('Deadline deleted successfully.');

        return redirect(route('deadlines.index'));
    }


    public function prices(){
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



        return view('front.prices')
            ->with('typepapers', $this->typepaperRepository->all())
            ->with('wordpages', $this->wordpageRepository->all())
            ->with('academiclevels', $this->academiclevelRepository->all())
            ->with('deadlines', $this->deadlineRepository->all())
            ->with('typeofworks', $this->typeofworksRepository->all())
            ->with('structure', $this->structureRepository->all())
            ->with('standarddeadlines', $this->standarddeadlineRepository->all())
            ->with('prices', $data3) //
            ->with('academiclevel', $data2) //
            ->with('deadline', $stdl) //
            ;
        //return view('front.prices')->with('prices', $this->deadlineRepository->all());
    }




}
