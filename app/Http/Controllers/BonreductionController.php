<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBonreductionRequest;
use App\Http\Requests\UpdateBonreductionRequest;
use App\Repositories\BonreductionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Bonreduction;
use App\Http\Requests;

class BonreductionController extends AppBaseController
{
    /** @var  BonreductionRepository */
    private $bonreductionRepository;

    public function __construct(BonreductionRepository $bonreductionRepo)
    {
        $this->bonreductionRepository = $bonreductionRepo;
    }

    /**
     * Display a listing of the Bonreduction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bonreductionRepository->pushCriteria(new RequestCriteria($request));
        $bonreductions = $this->bonreductionRepository->all();

        return view('bonreductions.index')
            ->with('bonreductions', $bonreductions);
    }

    /**
     * Show the form for creating a new Bonreduction.
     *
     * @return Response
     */
    public function create()
    {
        return view('bonreductions.create');
    }

    /**
     * Store a newly created Bonreduction in storage.
     *
     * @param CreateBonreductionRequest $request
     *
     * @return Response
     */
    public function store(CreateBonreductionRequest $request)
    {
        $input = $request->all();

        $bonreduction = $this->bonreductionRepository->create($input);

        Flash::success('Bonreduction saved successfully.');

        return redirect(route('bonreductions.index'));
    }

    /**
     * Display the specified Bonreduction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bonreduction = $this->bonreductionRepository->findWithoutFail($id);

        if (empty($bonreduction)) {
            Flash::error('Bonreduction not found');

            return redirect(route('bonreductions.index'));
        }

        return view('bonreductions.show')->with('bonreduction', $bonreduction);
    }

    /**
     * Show the form for editing the specified Bonreduction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bonreduction = $this->bonreductionRepository->findWithoutFail($id);

        if (empty($bonreduction)) {
            Flash::error('Bonreduction not found');

            return redirect(route('bonreductions.index'));
        }

        return view('bonreductions.edit')->with('bonreduction', $bonreduction);
    }

    /**
     * Update the specified Bonreduction in storage.
     *
     * @param  int              $id
     * @param UpdateBonreductionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBonreductionRequest $request)
    {
        $bonreduction = $this->bonreductionRepository->findWithoutFail($id);

        if (empty($bonreduction)) {
            Flash::error('Bonreduction not found');

            return redirect(route('bonreductions.index'));
        }

        $bonreduction = $this->bonreductionRepository->update($request->all(), $id);

        Flash::success('Bonreduction updated successfully.');

        return redirect(route('bonreductions.index'));
    }

    /**
     * Remove the specified Bonreduction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bonreduction = $this->bonreductionRepository->findWithoutFail($id);

        if (empty($bonreduction)) {
            Flash::error('Bonreduction not found');

            return redirect(route('bonreductions.index'));
        }

        $this->bonreductionRepository->delete($id);

        Flash::success('Bonreduction deleted successfully.');

        return redirect(route('bonreductions.index'));
    }



    public function getBonDeReduction(Request $request){


        $bonreductions = Bonreduction::where('code', $request->code)->get();
        $result = array();
        $result["statu"] = 0;
        if (count($bonreductions) > 0) {
            if($bonreductions[0]->isValid()) {
                $result["bon"] = $bonreductions[0];
                /*$result["bon"] = [
                    'code' => $bonreductions[0]->code,
                    'prix_fixe' => $bonreductions[0]->prix_fixe,
                    'prix_percent' => $bonreductions[0]->prix_percent,
                    'applique_prixfixe' => $bonreductions[0]->applique_prixfixe ? 'true' : 'false'
                ];*/
                $result["statu"] = 1;

            }
        }


        return response()->json($result);
    }

    public function bonExiste(Request $request){

        $bonreductions = Bonreduction::where('code', $request->code)->get();
        $result = array();
        $result["statu"] = 0;
        if (count($bonreductions) > 0) {
            $result["bon"] = $bonreductions[0];
            $result["statu"] = 1;

        }

        return response()->json($result);
    }


}
