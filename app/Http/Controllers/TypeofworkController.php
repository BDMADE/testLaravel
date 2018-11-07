<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeofworkRequest;
use App\Http\Requests\UpdateTypeofworkRequest;
use App\Repositories\TypeofworkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypeofworkController extends AppBaseController
{
    /** @var  TypeofworkRepository */
    private $typeofworkRepository;

    public function __construct(TypeofworkRepository $typeofworkRepo)
    {
        $this->typeofworkRepository = $typeofworkRepo;
    }

    /**
     * Display a listing of the Typeofwork.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeofworkRepository->pushCriteria(new RequestCriteria($request));
        $typeofworks = $this->typeofworkRepository->all();

        return view('typeofworks.index')
            ->with('typeofworks', $typeofworks);
    }

    /**
     * Show the form for creating a new Typeofwork.
     *
     * @return Response
     */
    public function create()
    {
        return view('typeofworks.create');
    }

    /**
     * Store a newly created Typeofwork in storage.
     *
     * @param CreateTypeofworkRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeofworkRequest $request)
    {
        $input = $request->all();

        $typeofwork = $this->typeofworkRepository->create($input);

        Flash::success('Typeofwork saved successfully.');

        return redirect(route('typeofworks.index'));
    }

    /**
     * Display the specified Typeofwork.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeofwork = $this->typeofworkRepository->findWithoutFail($id);

        if (empty($typeofwork)) {
            Flash::error('Typeofwork not found');

            return redirect(route('typeofworks.index'));
        }

        return view('typeofworks.show')->with('typeofwork', $typeofwork);
    }

    /**
     * Show the form for editing the specified Typeofwork.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeofwork = $this->typeofworkRepository->findWithoutFail($id);

        if (empty($typeofwork)) {
            Flash::error('Typeofwork not found');

            return redirect(route('typeofworks.index'));
        }

        return view('typeofworks.edit')->with('typeofwork', $typeofwork);
    }

    /**
     * Update the specified Typeofwork in storage.
     *
     * @param  int              $id
     * @param UpdateTypeofworkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeofworkRequest $request)
    {
        $typeofwork = $this->typeofworkRepository->findWithoutFail($id);

        if (empty($typeofwork)) {
            Flash::error('Typeofwork not found');

            return redirect(route('typeofworks.index'));
        }

        $typeofwork = $this->typeofworkRepository->update($request->all(), $id);

        Flash::success('Typeofwork updated successfully.');

        return redirect(route('typeofworks.index'));
    }

    /**
     * Remove the specified Typeofwork from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeofwork = $this->typeofworkRepository->findWithoutFail($id);

        if (empty($typeofwork)) {
            Flash::error('Typeofwork not found');

            return redirect(route('typeofworks.index'));
        }

        $this->typeofworkRepository->delete($id);

        Flash::success('Typeofwork deleted successfully.');

        return redirect(route('typeofworks.index'));
    }
}
