<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistoriquesRequest;
use App\Http\Requests\UpdateHistoriquesRequest;
use App\Repositories\HistoriquesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HistoriquesController extends AppBaseController
{
    /** @var  HistoriquesRepository */
    private $historiquesRepository;

    public function __construct(HistoriquesRepository $historiquesRepo)
    {
        $this->historiquesRepository = $historiquesRepo;
    }

    /**
     * Display a listing of the Historiques.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historiquesRepository->pushCriteria(new RequestCriteria($request));
        $historiques = $this->historiquesRepository->all();

        return view('historiques.index')
            ->with('historiques', $historiques);
    }

    /**
     * Show the form for creating a new Historiques.
     *
     * @return Response
     */
    public function create()
    {
        return view('historiques.create');
    }

    /**
     * Store a newly created Historiques in storage.
     *
     * @param CreateHistoriquesRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoriquesRequest $request)
    {
        $input = $request->all();

        $historiques = $this->historiquesRepository->create($input);

        Flash::success('Historiques saved successfully.');

        return redirect(route('historiques.index'));
    }

    /**
     * Display the specified Historiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historiques = $this->historiquesRepository->findWithoutFail($id);

        if (empty($historiques)) {
            Flash::error('Historiques not found');

            return redirect(route('historiques.index'));
        }

        return view('historiques.show')->with('historiques', $historiques);
    }

    /**
     * Show the form for editing the specified Historiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historiques = $this->historiquesRepository->findWithoutFail($id);

        if (empty($historiques)) {
            Flash::error('Historiques not found');

            return redirect(route('historiques.index'));
        }

        return view('historiques.edit')->with('historiques', $historiques);
    }

    /**
     * Update the specified Historiques in storage.
     *
     * @param  int              $id
     * @param UpdateHistoriquesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoriquesRequest $request)
    {
        $historiques = $this->historiquesRepository->findWithoutFail($id);

        if (empty($historiques)) {
            Flash::error('Historiques not found');

            return redirect(route('historiques.index'));
        }

        $historiques = $this->historiquesRepository->update($request->all(), $id);

        Flash::success('Historiques updated successfully.');

        return redirect(route('historiques.index'));
    }

    /**
     * Remove the specified Historiques from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historiques = $this->historiquesRepository->findWithoutFail($id);

        if (empty($historiques)) {
            Flash::error('Historiques not found');

            return redirect(route('historiques.index'));
        }

        $this->historiquesRepository->delete($id);

        Flash::success('Historiques deleted successfully.');

        return redirect(route('historiques.index'));
    }
}
