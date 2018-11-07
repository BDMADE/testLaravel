<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeofworksRequest;
use App\Http\Requests\UpdateTypeofworksRequest;
use App\Repositories\TypeofworksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypeofworksController extends AppBaseController
{
    /** @var  TypeofworksRepository */
    private $typeofworksRepository;

    public function __construct(TypeofworksRepository $typeofworksRepo)
    {
        $this->typeofworksRepository = $typeofworksRepo;
    }

    /**
     * Display a listing of the Typeofworks.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeofworksRepository->pushCriteria(new RequestCriteria($request));
        $typeofworks = $this->typeofworksRepository->all();

        return view('typeofworks.index')
            ->with('typeofworks', $typeofworks);
    }

    /**
     * Show the form for creating a new Typeofworks.
     *
     * @return Response
     */
    public function create()
    {
        return view('typeofworks.create');
    }

    /**
     * Store a newly created Typeofworks in storage.
     *
     * @param CreateTypeofworksRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeofworksRequest $request)
    {
        $input = $request->all();

        $typeofworks = $this->typeofworksRepository->create($input);

        Flash::success('Typeofworks saved successfully.');

        return redirect(route('typeofworks.index'));
    }

    /**
     * Display the specified Typeofworks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeofworks = $this->typeofworksRepository->findWithoutFail($id);

        if (empty($typeofworks)) {
            Flash::error('Typeofworks not found');

            return redirect(route('typeofworks.index'));
        }

        return view('typeofworks.show')->with('typeofworks', $typeofworks);
    }

    /**
     * Show the form for editing the specified Typeofworks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeofworks = $this->typeofworksRepository->findWithoutFail($id);

        if (empty($typeofworks)) {
            Flash::error('Typeofworks not found');

            return redirect(route('typeofworks.index'));
        }

        return view('typeofworks.edit')->with('typeofworks', $typeofworks);
    }

    /**
     * Update the specified Typeofworks in storage.
     *
     * @param  int              $id
     * @param UpdateTypeofworksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeofworksRequest $request)
    {
        $typeofworks = $this->typeofworksRepository->findWithoutFail($id);

        if (empty($typeofworks)) {
            Flash::error('Typeofworks not found');

            return redirect(route('typeofworks.index'));
        }

        $typeofworks = $this->typeofworksRepository->update($request->all(), $id);

        Flash::success('Typeofworks updated successfully.');

        return redirect(route('typeofworks.index'));
    }

    /**
     * Remove the specified Typeofworks from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeofworks = $this->typeofworksRepository->findWithoutFail($id);

        if (empty($typeofworks)) {
            Flash::error('Typeofworks not found');

            return redirect(route('typeofworks.index'));
        }

        $this->typeofworksRepository->delete($id);

        Flash::success('Typeofworks deleted successfully.');

        return redirect(route('typeofworks.index'));
    }
}
