<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtatRequest;
use App\Http\Requests\UpdateEtatRequest;
use App\Repositories\EtatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EtatController extends AppBaseController
{
    /** @var  EtatRepository */
    private $etatRepository;

    public function __construct(EtatRepository $etatRepo)
    {
        $this->etatRepository = $etatRepo;
    }

    /**
     * Display a listing of the Etat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->etatRepository->pushCriteria(new RequestCriteria($request));
        $etats = $this->etatRepository->all();

        return view('etats.index')
            ->with('etats', $etats);
    }

    /**
     * Show the form for creating a new Etat.
     *
     * @return Response
     */
    public function create()
    {
        return view('etats.create');
    }

    /**
     * Store a newly created Etat in storage.
     *
     * @param CreateEtatRequest $request
     *
     * @return Response
     */
    public function store(CreateEtatRequest $request)
    {
        $input = $request->all();

        $etat = $this->etatRepository->create($input);

        Flash::success('Etat saved successfully.');

        return redirect(route('etats.index'));
    }

    /**
     * Display the specified Etat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etat = $this->etatRepository->findWithoutFail($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        return view('etats.show')->with('etat', $etat);
    }

    /**
     * Show the form for editing the specified Etat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etat = $this->etatRepository->findWithoutFail($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        return view('etats.edit')->with('etat', $etat);
    }

    /**
     * Update the specified Etat in storage.
     *
     * @param  int              $id
     * @param UpdateEtatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtatRequest $request)
    {
        $etat = $this->etatRepository->findWithoutFail($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        $etat = $this->etatRepository->update($request->all(), $id);

        Flash::success('Etat updated successfully.');

        return redirect(route('etats.index'));
    }

    /**
     * Remove the specified Etat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etat = $this->etatRepository->findWithoutFail($id);

        if (empty($etat)) {
            Flash::error('Etat not found');

            return redirect(route('etats.index'));
        }

        $this->etatRepository->delete($id);

        Flash::success('Etat deleted successfully.');

        return redirect(route('etats.index'));
    }
}
