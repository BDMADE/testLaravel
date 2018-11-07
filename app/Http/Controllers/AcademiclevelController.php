<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcademiclevelRequest;
use App\Http\Requests\UpdateAcademiclevelRequest;
use App\Repositories\AcademiclevelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AcademiclevelController extends AppBaseController
{
    /** @var  AcademiclevelRepository */
    private $academiclevelRepository;

    public function __construct(AcademiclevelRepository $academiclevelRepo)
    {
        $this->academiclevelRepository = $academiclevelRepo;
    }

    /**
     * Display a listing of the Academiclevel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->academiclevelRepository->pushCriteria(new RequestCriteria($request));
        $academiclevels = $this->academiclevelRepository->all();

        return view('academiclevels.index')
            ->with('academiclevels', $academiclevels);
    }

    /**
     * Show the form for creating a new Academiclevel.
     *
     * @return Response
     */
    public function create()
    {
        return view('academiclevels.create');
    }

    /**
     * Store a newly created Academiclevel in storage.
     *
     * @param CreateAcademiclevelRequest $request
     *
     * @return Response
     */
    public function store(CreateAcademiclevelRequest $request)
    {
        $input = $request->all();

        $academiclevel = $this->academiclevelRepository->create($input);

        Flash::success('Academiclevel saved successfully.');

        return redirect(route('academiclevels.index'));
    }

    /**
     * Display the specified Academiclevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $academiclevel = $this->academiclevelRepository->findWithoutFail($id);

        if (empty($academiclevel)) {
            Flash::error('Academiclevel not found');

            return redirect(route('academiclevels.index'));
        }

        return view('academiclevels.show')->with('academiclevel', $academiclevel);
    }

    /**
     * Show the form for editing the specified Academiclevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $academiclevel = $this->academiclevelRepository->findWithoutFail($id);

        if (empty($academiclevel)) {
            Flash::error('Academiclevel not found');

            return redirect(route('academiclevels.index'));
        }

        return view('academiclevels.edit')->with('academiclevel', $academiclevel);
    }

    /**
     * Update the specified Academiclevel in storage.
     *
     * @param  int              $id
     * @param UpdateAcademiclevelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAcademiclevelRequest $request)
    {
        $academiclevel = $this->academiclevelRepository->findWithoutFail($id);

        if (empty($academiclevel)) {
            Flash::error('Academiclevel not found');

            return redirect(route('academiclevels.index'));
        }

        $academiclevel = $this->academiclevelRepository->update($request->all(), $id);

        Flash::success('Academiclevel updated successfully.');

        return redirect(route('academiclevels.index'));
    }

    /**
     * Remove the specified Academiclevel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $academiclevel = $this->academiclevelRepository->findWithoutFail($id);

        if (empty($academiclevel)) {
            Flash::error('Academiclevel not found');

            return redirect(route('academiclevels.index'));
        }

        $this->academiclevelRepository->delete($id);

        Flash::success('Academiclevel deleted successfully.');

        return redirect(route('academiclevels.index'));
    }
}
