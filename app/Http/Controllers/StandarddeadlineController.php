<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStandarddeadlineRequest;
use App\Http\Requests\UpdateStandarddeadlineRequest;
use App\Repositories\StandarddeadlineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StandarddeadlineController extends AppBaseController
{
    /** @var  StandarddeadlineRepository */
    private $standarddeadlineRepository;

    public function __construct(StandarddeadlineRepository $standarddeadlineRepo)
    {
        $this->standarddeadlineRepository = $standarddeadlineRepo;
    }

    /**
     * Display a listing of the Standarddeadline.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->standarddeadlineRepository->pushCriteria(new RequestCriteria($request));
        $standarddeadlines = $this->standarddeadlineRepository->all();

        return view('standarddeadlines.index')
            ->with('standarddeadlines', $standarddeadlines);
    }

    /**
     * Show the form for creating a new Standarddeadline.
     *
     * @return Response
     */
    public function create()
    {
        return view('standarddeadlines.create');
    }

    /**
     * Store a newly created Standarddeadline in storage.
     *
     * @param CreateStandarddeadlineRequest $request
     *
     * @return Response
     */
    public function store(CreateStandarddeadlineRequest $request)
    {
        $input = $request->all();

        $standarddeadline = $this->standarddeadlineRepository->create($input);

        Flash::success('Standarddeadline saved successfully.');

        return redirect(route('standarddeadlines.index'));
    }

    /**
     * Display the specified Standarddeadline.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $standarddeadline = $this->standarddeadlineRepository->findWithoutFail($id);

        if (empty($standarddeadline)) {
            Flash::error('Standarddeadline not found');

            return redirect(route('standarddeadlines.index'));
        }

        return view('standarddeadlines.show')->with('standarddeadline', $standarddeadline);
    }

    /**
     * Show the form for editing the specified Standarddeadline.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $standarddeadline = $this->standarddeadlineRepository->findWithoutFail($id);

        if (empty($standarddeadline)) {
            Flash::error('Standarddeadline not found');

            return redirect(route('standarddeadlines.index'));
        }

        return view('standarddeadlines.edit')->with('standarddeadline', $standarddeadline);
    }

    /**
     * Update the specified Standarddeadline in storage.
     *
     * @param  int              $id
     * @param UpdateStandarddeadlineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStandarddeadlineRequest $request)
    {
        $standarddeadline = $this->standarddeadlineRepository->findWithoutFail($id);

        if (empty($standarddeadline)) {
            Flash::error('Standarddeadline not found');

            return redirect(route('standarddeadlines.index'));
        }

        $standarddeadline = $this->standarddeadlineRepository->update($request->all(), $id);

        Flash::success('Standarddeadline updated successfully.');

        return redirect(route('standarddeadlines.index'));
    }

    /**
     * Remove the specified Standarddeadline from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $standarddeadline = $this->standarddeadlineRepository->findWithoutFail($id);

        if (empty($standarddeadline)) {
            Flash::error('Standarddeadline not found');

            return redirect(route('standarddeadlines.index'));
        }

        $this->standarddeadlineRepository->delete($id);

        Flash::success('Standarddeadline deleted successfully.');

        return redirect(route('standarddeadlines.index'));
    }
}
