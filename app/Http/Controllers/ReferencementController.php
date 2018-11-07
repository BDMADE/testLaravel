<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReferencementRequest;
use App\Http\Requests\UpdateReferencementRequest;
use App\Repositories\ReferencementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReferencementController extends AppBaseController
{
    /** @var  ReferencementRepository */
    private $referencementRepository;

    public function __construct(ReferencementRepository $referencementRepo)
    {
        $this->referencementRepository = $referencementRepo;
    }

    /**
     * Display a listing of the Referencement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->referencementRepository->pushCriteria(new RequestCriteria($request));
        $referencements = $this->referencementRepository->all();

        return view('referencements.index')
            ->with('referencements', $referencements);
    }

    /**
     * Show the form for creating a new Referencement.
     *
     * @return Response
     */
    public function create()
    {
        return view('referencements.create');
    }

    /**
     * Store a newly created Referencement in storage.
     *
     * @param CreateReferencementRequest $request
     *
     * @return Response
     */
    public function store(CreateReferencementRequest $request)
    {
        $input = $request->all();

        $referencement = $this->referencementRepository->create($input);

        Flash::success('Referencement saved successfully.');

        return redirect(route('referencements.index'));
    }

    /**
     * Display the specified Referencement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $referencement = $this->referencementRepository->findWithoutFail($id);

        if (empty($referencement)) {
            Flash::error('Referencement not found');

            return redirect(route('referencements.index'));
        }

        return view('referencements.show')->with('referencement', $referencement);
    }

    /**
     * Show the form for editing the specified Referencement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $referencement = $this->referencementRepository->findWithoutFail($id);

        if (empty($referencement)) {
            Flash::error('Referencement not found');

            return redirect(route('referencements.index'));
        }

        return view('referencements.edit')->with('referencement', $referencement);
    }

    /**
     * Update the specified Referencement in storage.
     *
     * @param  int              $id
     * @param UpdateReferencementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReferencementRequest $request)
    {
        $referencement = $this->referencementRepository->findWithoutFail($id);

        if (empty($referencement)) {
            Flash::error('Referencement not found');

            return redirect(route('referencements.index'));
        }

        $referencement = $this->referencementRepository->update($request->all(), $id);

        Flash::success('Referencement updated successfully.');

        return redirect(route('referencements.index'));
    }

    /**
     * Remove the specified Referencement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $referencement = $this->referencementRepository->findWithoutFail($id);

        if (empty($referencement)) {
            Flash::error('Referencement not found');

            return redirect(route('referencements.index'));
        }

        $this->referencementRepository->delete($id);

        Flash::success('Referencement deleted successfully.');

        return redirect(route('referencements.index'));
    }
}
