<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaysRequest;
use App\Http\Requests\UpdatePaysRequest;
use App\Repositories\PaysRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaysController extends AppBaseController
{
    /** @var  PaysRepository */
    private $paysRepository;

    public function __construct(PaysRepository $paysRepo)
    {
        $this->paysRepository = $paysRepo;
    }

    /**
     * Display a listing of the Pays.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paysRepository->pushCriteria(new RequestCriteria($request));
        $pays = $this->paysRepository->all();

        return view('pays.index')
            ->with('pays', $pays);
    }

    /**
     * Show the form for creating a new Pays.
     *
     * @return Response
     */
    public function create()
    {
        return view('pays.create');
    }

    /**
     * Store a newly created Pays in storage.
     *
     * @param CreatePaysRequest $request
     *
     * @return Response
     */
    public function store(CreatePaysRequest $request)
    {
        $input = $request->all();

        $pays = $this->paysRepository->create($input);

        Flash::success('Pays saved successfully.');

        return redirect(route('pays.index'));
    }

    /**
     * Display the specified Pays.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pays = $this->paysRepository->findWithoutFail($id);

        if (empty($pays)) {
            Flash::error('Pays not found');

            return redirect(route('pays.index'));
        }

        return view('pays.show')->with('pays', $pays);
    }

    /**
     * Show the form for editing the specified Pays.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pays = $this->paysRepository->findWithoutFail($id);

        if (empty($pays)) {
            Flash::error('Pays not found');

            return redirect(route('pays.index'));
        }

        return view('pays.edit')->with('pays', $pays);
    }

    /**
     * Update the specified Pays in storage.
     *
     * @param  int              $id
     * @param UpdatePaysRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaysRequest $request)
    {
        $pays = $this->paysRepository->findWithoutFail($id);

        if (empty($pays)) {
            Flash::error('Pays not found');

            return redirect(route('pays.index'));
        }

        $pays = $this->paysRepository->update($request->all(), $id);

        Flash::success('Pays updated successfully.');

        return redirect(route('pays.index'));
    }

    /**
     * Remove the specified Pays from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pays = $this->paysRepository->findWithoutFail($id);

        if (empty($pays)) {
            Flash::error('Pays not found');

            return redirect(route('pays.index'));
        }

        $this->paysRepository->delete($id);

        Flash::success('Pays deleted successfully.');

        return redirect(route('pays.index'));
    }
}
