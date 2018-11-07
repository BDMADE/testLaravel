<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypepaperRequest;
use App\Http\Requests\UpdateTypepaperRequest;
use App\Repositories\TypepaperRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypepaperController extends AppBaseController
{
    /** @var  TypepaperRepository */
    private $typepaperRepository;

    public function __construct(TypepaperRepository $typepaperRepo)
    {
        $this->typepaperRepository = $typepaperRepo;
    }

    /**
     * Display a listing of the Typepaper.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typepaperRepository->pushCriteria(new RequestCriteria($request));
        $typepapers = $this->typepaperRepository->all();

        return view('typepapers.index')
            ->with('typepapers', $typepapers);
    }

    /**
     * Show the form for creating a new Typepaper.
     *
     * @return Response
     */
    public function create()
    {
        return view('typepapers.create');
    }

    /**
     * Store a newly created Typepaper in storage.
     *
     * @param CreateTypepaperRequest $request
     *
     * @return Response
     */
    public function store(CreateTypepaperRequest $request)
    {
        $input = $request->all();

        $typepaper = $this->typepaperRepository->create($input);

        Flash::success('Typepaper saved successfully.');

        return redirect(route('typepapers.index'));
    }

    /**
     * Display the specified Typepaper.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typepaper = $this->typepaperRepository->findWithoutFail($id);

        if (empty($typepaper)) {
            Flash::error('Typepaper not found');

            return redirect(route('typepapers.index'));
        }

        return view('typepapers.show')->with('typepaper', $typepaper);
    }

    /**
     * Show the form for editing the specified Typepaper.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typepaper = $this->typepaperRepository->findWithoutFail($id);

        if (empty($typepaper)) {
            Flash::error('Typepaper not found');

            return redirect(route('typepapers.index'));
        }

        return view('typepapers.edit')->with('typepaper', $typepaper);
    }

    /**
     * Update the specified Typepaper in storage.
     *
     * @param  int              $id
     * @param UpdateTypepaperRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypepaperRequest $request)
    {
        $typepaper = $this->typepaperRepository->findWithoutFail($id);

        if (empty($typepaper)) {
            Flash::error('Typepaper not found');

            return redirect(route('typepapers.index'));
        }

        $typepaper = $this->typepaperRepository->update($request->all(), $id);

        Flash::success('Typepaper updated successfully.');

        return redirect(route('typepapers.index'));
    }

    /**
     * Remove the specified Typepaper from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typepaper = $this->typepaperRepository->findWithoutFail($id);

        if (empty($typepaper)) {
            Flash::error('Typepaper not found');

            return redirect(route('typepapers.index'));
        }

        $this->typepaperRepository->delete($id);

        Flash::success('Typepaper deleted successfully.');

        return redirect(route('typepapers.index'));
    }
}
