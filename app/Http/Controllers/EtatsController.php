<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtatsRequest;
use App\Http\Requests\UpdateEtatsRequest;
use App\Repositories\EtatsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EtatsController extends AppBaseController
{
    /** @var  EtatsRepository */
    private $etatsRepository;

    public function __construct(EtatsRepository $etatsRepo)
    {
        $this->etatsRepository = $etatsRepo;
    }

    /**
     * Display a listing of the Etats.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->etatsRepository->pushCriteria(new RequestCriteria($request));
        $etats = $this->etatsRepository->all();

        return view('etats.index')
            ->with('etats', $etats);
    }

    /**
     * Show the form for creating a new Etats.
     *
     * @return Response
     */
    public function create()
    {
        return view('etats.create');
    }

    /**
     * Store a newly created Etats in storage.
     *
     * @param CreateEtatsRequest $request
     *
     * @return Response
     */
    public function store(CreateEtatsRequest $request)
    {
        $input = $request->all();

        $etats = $this->etatsRepository->create($input);

        Flash::success('Etats saved successfully.');

        return redirect(route('etats.index'));
    }

    /**
     * Display the specified Etats.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etats = $this->etatsRepository->findWithoutFail($id);

        if (empty($etats)) {
            Flash::error('Etats not found');

            return redirect(route('etats.index'));
        }

        return view('etats.show')->with('etats', $etats);
    }

    /**
     * Show the form for editing the specified Etats.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etats = $this->etatsRepository->findWithoutFail($id);

        if (empty($etats)) {
            Flash::error('Etats not found');

            return redirect(route('etats.index'));
        }

        return view('etats.edit')->with('etats', $etats);
    }

    /**
     * Update the specified Etats in storage.
     *
     * @param  int              $id
     * @param UpdateEtatsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtatsRequest $request)
    {
        $etats = $this->etatsRepository->findWithoutFail($id);

        if (empty($etats)) {
            Flash::error('Etats not found');

            return redirect(route('etats.index'));
        }

        $etats = $this->etatsRepository->update($request->all(), $id);

        Flash::success('Etats updated successfully.');

        return redirect(route('etats.index'));
    }

    /**
     * Remove the specified Etats from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etats = $this->etatsRepository->findWithoutFail($id);

        if (empty($etats)) {
            Flash::error('Etats not found');

            return redirect(route('etats.index'));
        }

        $this->etatsRepository->delete($id);

        Flash::success('Etats deleted successfully.');

        return redirect(route('etats.index'));
    }
}
