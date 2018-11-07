<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserslevelRequest;
use App\Http\Requests\UpdateUserslevelRequest;
use App\Repositories\UserslevelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserslevelController extends AppBaseController
{
    /** @var  UserslevelRepository */
    private $userslevelRepository;

    public function __construct(UserslevelRepository $userslevelRepo)
    {
        $this->userslevelRepository = $userslevelRepo;
    }

    /**
     * Display a listing of the Userslevel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userslevelRepository->pushCriteria(new RequestCriteria($request));
        $userslevels = $this->userslevelRepository->all();

        return view('userslevels.index')
            ->with('userslevels', $userslevels);
    }

    /**
     * Show the form for creating a new Userslevel.
     *
     * @return Response
     */
    public function create()
    {
        return view('userslevels.create');
    }

    /**
     * Store a newly created Userslevel in storage.
     *
     * @param CreateUserslevelRequest $request
     *
     * @return Response
     */
    public function store(CreateUserslevelRequest $request)
    {
        $input = $request->all();

        $userslevel = $this->userslevelRepository->create($input);

        Flash::success('Userslevel saved successfully.');

        return redirect(route('userslevels.index'));
    }

    /**
     * Display the specified Userslevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userslevel = $this->userslevelRepository->findWithoutFail($id);

        if (empty($userslevel)) {
            Flash::error('Userslevel not found');

            return redirect(route('userslevels.index'));
        }

        return view('userslevels.show')->with('userslevel', $userslevel);
    }

    /**
     * Show the form for editing the specified Userslevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userslevel = $this->userslevelRepository->findWithoutFail($id);

        if (empty($userslevel)) {
            Flash::error('Userslevel not found');

            return redirect(route('userslevels.index'));
        }

        return view('userslevels.edit')->with('userslevel', $userslevel);
    }

    /**
     * Update the specified Userslevel in storage.
     *
     * @param  int              $id
     * @param UpdateUserslevelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserslevelRequest $request)
    {
        $userslevel = $this->userslevelRepository->findWithoutFail($id);

        if (empty($userslevel)) {
            Flash::error('Userslevel not found');

            return redirect(route('userslevels.index'));
        }

        $userslevel = $this->userslevelRepository->update($request->all(), $id);

        Flash::success('Userslevel updated successfully.');

        return redirect(route('userslevels.index'));
    }

    /**
     * Remove the specified Userslevel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userslevel = $this->userslevelRepository->findWithoutFail($id);

        if (empty($userslevel)) {
            Flash::error('Userslevel not found');

            return redirect(route('userslevels.index'));
        }

        $this->userslevelRepository->delete($id);

        Flash::success('Userslevel deleted successfully.');

        return redirect(route('userslevels.index'));
    }
}
