<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTindakanikanRequest;
use App\Http\Requests\UpdateTindakanikanRequest;
use App\Repositories\TindakanikanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TindakanikanController extends AppBaseController
{
    /** @var  TindakanikanRepository */
    private $tindakanikanRepository;

    public function __construct(TindakanikanRepository $tindakanikanRepo)
    {
        $this->tindakanikanRepository = $tindakanikanRepo;
    }

    /**
     * Display a listing of the Tindakanikan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tindakanikanRepository->pushCriteria(new RequestCriteria($request));
        $tindakanikans = $this->tindakanikanRepository->all();

        return view('tindakanikans.index')
            ->with('tindakanikans', $tindakanikans);
    }

    /**
     * Show the form for creating a new Tindakanikan.
     *
     * @return Response
     */
    public function create()
    {
        return view('tindakanikans.create');
    }

    /**
     * Store a newly created Tindakanikan in storage.
     *
     * @param CreateTindakanikanRequest $request
     *
     * @return Response
     */
    public function store(CreateTindakanikanRequest $request)
    {
        $input = $request->all();

        $tindakanikan = $this->tindakanikanRepository->create($input);

        Flash::success('Tindakanikan saved successfully.');

        return redirect(route('tindakanikans.index'));
    }

    /**
     * Display the specified Tindakanikan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tindakanikan = $this->tindakanikanRepository->findWithoutFail($id);

        if (empty($tindakanikan)) {
            Flash::error('Tindakanikan not found');

            return redirect(route('tindakanikans.index'));
        }

        return view('tindakanikans.show')->with('tindakanikan', $tindakanikan);
    }

    /**
     * Show the form for editing the specified Tindakanikan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tindakanikan = $this->tindakanikanRepository->findWithoutFail($id);

        if (empty($tindakanikan)) {
            Flash::error('Tindakanikan not found');

            return redirect(route('tindakanikans.index'));
        }

        return view('tindakanikans.edit')->with('tindakanikan', $tindakanikan);
    }

    /**
     * Update the specified Tindakanikan in storage.
     *
     * @param  int              $id
     * @param UpdateTindakanikanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTindakanikanRequest $request)
    {
        $tindakanikan = $this->tindakanikanRepository->findWithoutFail($id);

        if (empty($tindakanikan)) {
            Flash::error('Tindakanikan not found');

            return redirect(route('tindakanikans.index'));
        }

        $tindakanikan = $this->tindakanikanRepository->update($request->all(), $id);

        Flash::success('Tindakanikan updated successfully.');

        return redirect(route('tindakanikans.index'));
    }

    /**
     * Remove the specified Tindakanikan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tindakanikan = $this->tindakanikanRepository->findWithoutFail($id);

        if (empty($tindakanikan)) {
            Flash::error('Tindakanikan not found');

            return redirect(route('tindakanikans.index'));
        }

        $this->tindakanikanRepository->delete($id);

        Flash::success('Tindakanikan deleted successfully.');

        return redirect(route('tindakanikans.index'));
    }
}
