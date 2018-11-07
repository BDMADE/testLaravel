<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStructureRequest;
use App\Http\Requests\UpdateStructureRequest;
use App\Repositories\StructureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StructureController extends AppBaseController
{
    /** @var  StructureRepository */
    private $structureRepository;

    public function __construct(StructureRepository $structureRepo)
    {
        $this->structureRepository = $structureRepo;
    }

    /**
     * Display a listing of the Structure.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->structureRepository->pushCriteria(new RequestCriteria($request));
        $structures = $this->structureRepository->all();

        return view('structures.index')
            ->with('structures', $structures);
    }

    /**
     * Show the form for creating a new Structure.
     *
     * @return Response
     */
    public function create()
    {
        return view('structures.create');
    }

    /**
     * Store a newly created Structure in storage.
     *
     * @param CreateStructureRequest $request
     *
     * @return Response
     */
    public function store(CreateStructureRequest $request)
    {
        $input = $request->all();

        $structure = $this->structureRepository->create($input);

        Flash::success('Structure saved successfully.');

        return redirect(route('structures.index'));
    }

    /**
     * Display the specified Structure.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $structure = $this->structureRepository->findWithoutFail($id);

        if (empty($structure)) {
            Flash::error('Structure not found');

            return redirect(route('structures.index'));
        }

        return view('structures.show')->with('structure', $structure);
    }

    /**
     * Show the form for editing the specified Structure.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $structure = $this->structureRepository->findWithoutFail($id);

        if (empty($structure)) {
            Flash::error('Structure not found');

            return redirect(route('structures.index'));
        }

        return view('structures.edit')->with('structure', $structure);
    }

    /**
     * Update the specified Structure in storage.
     *
     * @param  int              $id
     * @param UpdateStructureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStructureRequest $request)
    {
        $structure = $this->structureRepository->findWithoutFail($id);

        if (empty($structure)) {
            Flash::error('Structure not found');

            return redirect(route('structures.index'));
        }

        $structure = $this->structureRepository->update($request->all(), $id);

        Flash::success('Structure updated successfully.');

        return redirect(route('structures.index'));
    }

    /**
     * Remove the specified Structure from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $structure = $this->structureRepository->findWithoutFail($id);

        if (empty($structure)) {
            Flash::error('Structure not found');

            return redirect(route('structures.index'));
        }

        $this->structureRepository->delete($id);

        Flash::success('Structure deleted successfully.');

        return redirect(route('structures.index'));
    }
}
