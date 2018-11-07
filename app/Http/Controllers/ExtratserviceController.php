<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExtratserviceRequest;
use App\Http\Requests\UpdateExtratserviceRequest;
use App\Repositories\ExtratserviceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ExtratserviceController extends AppBaseController
{
    /** @var  ExtratserviceRepository */
    private $extratserviceRepository;

    public function __construct(ExtratserviceRepository $extratserviceRepo)
    {
        $this->extratserviceRepository = $extratserviceRepo;
    }

    /**
     * Display a listing of the Extratservice.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->extratserviceRepository->pushCriteria(new RequestCriteria($request));
        $extratservices = $this->extratserviceRepository->all();

        return view('extratservices.index')
            ->with('extratservices', $extratservices);
    }

    /**
     * Show the form for creating a new Extratservice.
     *
     * @return Response
     */
    public function create()
    {
        return view('extratservices.create');
    }

    /**
     * Store a newly created Extratservice in storage.
     *
     * @param CreateExtratserviceRequest $request
     *
     * @return Response
     */
    public function store(CreateExtratserviceRequest $request)
    {
        $input = $request->all();

        $extratservice = $this->extratserviceRepository->create($input);

        Flash::success('Extratservice saved successfully.');

        return redirect(route('extratservices.index'));
    }

    /**
     * Display the specified Extratservice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $extratservice = $this->extratserviceRepository->findWithoutFail($id);

        if (empty($extratservice)) {
            Flash::error('Extratservice not found');

            return redirect(route('extratservices.index'));
        }

        return view('extratservices.show')->with('extratservice', $extratservice);
    }

    /**
     * Show the form for editing the specified Extratservice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $extratservice = $this->extratserviceRepository->findWithoutFail($id);

        if (empty($extratservice)) {
            Flash::error('Extratservice not found');

            return redirect(route('extratservices.index'));
        }

        return view('extratservices.edit')->with('extratservice', $extratservice);
    }

    /**
     * Update the specified Extratservice in storage.
     *
     * @param  int              $id
     * @param UpdateExtratserviceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExtratserviceRequest $request)
    {
        $extratservice = $this->extratserviceRepository->findWithoutFail($id);

        if (empty($extratservice)) {
            Flash::error('Extratservice not found');

            return redirect(route('extratservices.index'));
        }

        $extratservice = $this->extratserviceRepository->update($request->all(), $id);

        Flash::success('Extratservice updated successfully.');

        return redirect(route('extratservices.index'));
    }

    /**
     * Remove the specified Extratservice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $extratservice = $this->extratserviceRepository->findWithoutFail($id);

        if (empty($extratservice)) {
            Flash::error('Extratservice not found');

            return redirect(route('extratservices.index'));
        }

        $this->extratserviceRepository->delete($id);

        Flash::success('Extratservice deleted successfully.');

        return redirect(route('extratservices.index'));
    }
}
