<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWordpageRequest;
use App\Http\Requests\UpdateWordpageRequest;
use App\Repositories\WordpageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WordpageController extends AppBaseController
{
    /** @var  WordpageRepository */
    private $wordpageRepository;

    public function __construct(WordpageRepository $wordpageRepo)
    {
        $this->wordpageRepository = $wordpageRepo;
    }

    /**
     * Display a listing of the Wordpage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wordpageRepository->pushCriteria(new RequestCriteria($request));
        $wordpages = $this->wordpageRepository->all();

        return view('wordpages.index')
            ->with('wordpages', $wordpages);
    }

    /**
     * Show the form for creating a new Wordpage.
     *
     * @return Response
     */
    public function create()
    {
        return view('wordpages.create');
    }

    /**
     * Store a newly created Wordpage in storage.
     *
     * @param CreateWordpageRequest $request
     *
     * @return Response
     */
    public function store(CreateWordpageRequest $request)
    {
        $input = $request->all();

        $wordpage = $this->wordpageRepository->create($input);

        Flash::success('Wordpage saved successfully.');

        return redirect(route('wordpages.index'));
    }

    /**
     * Display the specified Wordpage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wordpage = $this->wordpageRepository->findWithoutFail($id);

        if (empty($wordpage)) {
            Flash::error('Wordpage not found');

            return redirect(route('wordpages.index'));
        }

        return view('wordpages.show')->with('wordpage', $wordpage);
    }

    /**
     * Show the form for editing the specified Wordpage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wordpage = $this->wordpageRepository->findWithoutFail($id);

        if (empty($wordpage)) {
            Flash::error('Wordpage not found');

            return redirect(route('wordpages.index'));
        }

        return view('wordpages.edit')->with('wordpage', $wordpage);
    }

    /**
     * Update the specified Wordpage in storage.
     *
     * @param  int              $id
     * @param UpdateWordpageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWordpageRequest $request)
    {
        $wordpage = $this->wordpageRepository->findWithoutFail($id);

        if (empty($wordpage)) {
            Flash::error('Wordpage not found');

            return redirect(route('wordpages.index'));
        }

        $wordpage = $this->wordpageRepository->update($request->all(), $id);

        Flash::success('Wordpage updated successfully.');

        return redirect(route('wordpages.index'));
    }

    /**
     * Remove the specified Wordpage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wordpage = $this->wordpageRepository->findWithoutFail($id);

        if (empty($wordpage)) {
            Flash::error('Wordpage not found');

            return redirect(route('wordpages.index'));
        }

        $this->wordpageRepository->delete($id);

        Flash::success('Wordpage deleted successfully.');

        return redirect(route('wordpages.index'));
    }
}
