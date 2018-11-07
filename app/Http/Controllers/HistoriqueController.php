<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistoriqueRequest;
use App\Http\Requests\UpdateHistoriqueRequest;
use App\Repositories\HistoriqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HistoriqueController extends AppBaseController
{
    /** @var  HistoriqueRepository */
    private $historiqueRepository;

    public function __construct(HistoriqueRepository $historiqueRepo)
    {
        $this->historiqueRepository = $historiqueRepo;
    }

    /**
     * Display a listing of the Historique.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historiqueRepository->pushCriteria(new RequestCriteria($request));
        $historiques = $this->historiqueRepository->all();

        return view('historiques.index')
            ->with('historiques', $historiques);
    }

    /**
     * Show the form for creating a new Historique.
     *
     * @return Response
     */
    public function create()
    {
        return view('historiques.create');
    }

    /**
     * Store a newly created Historique in storage.
     *
     * @param CreateHistoriqueRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoriqueRequest $request)
    {
        $input = $request->all();

        $historique = $this->historiqueRepository->create($input);

        Flash::success('Historique saved successfully.');

        return redirect(route('historiques.index'));
    }

    /**
     * Display the specified Historique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historique = $this->historiqueRepository->findWithoutFail($id);

        if (empty($historique)) {
            Flash::error('Historique not found');

            return redirect(route('historiques.index'));
        }

        return view('historiques.show')->with('historique', $historique);
    }

    /**
     * Show the form for editing the specified Historique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historique = $this->historiqueRepository->findWithoutFail($id);

        if (empty($historique)) {
            Flash::error('Historique not found');

            return redirect(route('historiques.index'));
        }

        return view('historiques.edit')->with('historique', $historique);
    }

    /**
     * Update the specified Historique in storage.
     *
     * @param  int              $id
     * @param UpdateHistoriqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoriqueRequest $request)
    {
        $historique = $this->historiqueRepository->findWithoutFail($id);

        if (empty($historique)) {
            Flash::error('Historique not found');

            return redirect(route('historiques.index'));
        }

        $historique = $this->historiqueRepository->update($request->all(), $id);

        Flash::success('Historique updated successfully.');

        return redirect(route('historiques.index'));
    }

    /**
     * Remove the specified Historique from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historique = $this->historiqueRepository->findWithoutFail($id);

        if (empty($historique)) {
            Flash::error('Historique not found');

            return redirect(route('historiques.index'));
        }

        $this->historiqueRepository->delete($id);

        Flash::success('Historique deleted successfully.');

        return redirect(route('historiques.index'));
    }
}
