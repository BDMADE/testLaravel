<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeformatRequest;
use App\Http\Requests\UpdateTypeformatRequest;
use App\Repositories\TypeformatRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypeformatController extends AppBaseController
{
    /** @var  TypeformatRepository */
    private $typeformatRepository;

    public function __construct(TypeformatRepository $typeformatRepo)
    {
        $this->typeformatRepository = $typeformatRepo;
    }

    /**
     * Display a listing of the Typeformat.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeformatRepository->pushCriteria(new RequestCriteria($request));
        $typeformats = $this->typeformatRepository->all();

        return view('typeformats.index')
            ->with('typeformats', $typeformats);
    }

    /**
     * Show the form for creating a new Typeformat.
     *
     * @return Response
     */
    public function create()
    {
        return view('typeformats.create');
    }

    /**
     * Store a newly created Typeformat in storage.
     *
     * @param CreateTypeformatRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeformatRequest $request)
    {
        $input = $request->all();

        $typeformat = $this->typeformatRepository->create($input);

        Flash::success('Typeformat saved successfully.');

        return redirect(route('typeformats.index'));
    }

    /**
     * Display the specified Typeformat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeformat = $this->typeformatRepository->findWithoutFail($id);

        if (empty($typeformat)) {
            Flash::error('Typeformat not found');

            return redirect(route('typeformats.index'));
        }

        return view('typeformats.show')->with('typeformat', $typeformat);
    }

    /**
     * Show the form for editing the specified Typeformat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeformat = $this->typeformatRepository->findWithoutFail($id);

        if (empty($typeformat)) {
            Flash::error('Typeformat not found');

            return redirect(route('typeformats.index'));
        }

        return view('typeformats.edit')->with('typeformat', $typeformat);
    }

    /**
     * Update the specified Typeformat in storage.
     *
     * @param  int              $id
     * @param UpdateTypeformatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeformatRequest $request)
    {
        $typeformat = $this->typeformatRepository->findWithoutFail($id);

        if (empty($typeformat)) {
            Flash::error('Typeformat not found');

            return redirect(route('typeformats.index'));
        }

        $typeformat = $this->typeformatRepository->update($request->all(), $id);

        Flash::success('Typeformat updated successfully.');

        return redirect(route('typeformats.index'));
    }

    /**
     * Remove the specified Typeformat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeformat = $this->typeformatRepository->findWithoutFail($id);

        if (empty($typeformat)) {
            Flash::error('Typeformat not found');

            return redirect(route('typeformats.index'));
        }

        $this->typeformatRepository->delete($id);

        Flash::success('Typeformat deleted successfully.');

        return redirect(route('typeformats.index'));
    }
}
