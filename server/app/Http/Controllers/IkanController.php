<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIkanRequest;
use App\Http\Requests\UpdateIkanRequest;
use App\Repositories\IkanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IkanController extends AppBaseController
{
    /** @var  IkanRepository */
    private $ikanRepository;

    public function __construct(IkanRepository $ikanRepo)
    {
        $this->ikanRepository = $ikanRepo;
    }

    /**
     * Display a listing of the Ikan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ikanRepository->pushCriteria(new RequestCriteria($request));
        $ikans = $this->ikanRepository->all();

        return view('ikans.index')
            ->with('ikans', $ikans);
    }

    /**
     * Show the form for creating a new Ikan.
     *
     * @return Response
     */
    public function create()
    {
        return view('ikans.create');
    }

    /**
     * Store a newly created Ikan in storage.
     *
     * @param CreateIkanRequest $request
     *
     * @return Response
     */
    public function store(CreateIkanRequest $request)
    {
        $input = $request->all();

        $ikan = $this->ikanRepository->create($input);

        Flash::success('Ikan saved successfully.');

        return redirect(route('ikans.index'));
    }

    /**
     * Display the specified Ikan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            Flash::error('Ikan not found');

            return redirect(route('ikans.index'));
        }

        return view('ikans.show')->with('ikan', $ikan);
    }

    /**
     * Show the form for editing the specified Ikan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            Flash::error('Ikan not found');

            return redirect(route('ikans.index'));
        }

        return view('ikans.edit')->with('ikan', $ikan);
    }

    /**
     * Update the specified Ikan in storage.
     *
     * @param  int              $id
     * @param UpdateIkanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIkanRequest $request)
    {
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            Flash::error('Ikan not found');

            return redirect(route('ikans.index'));
        }

        $ikan = $this->ikanRepository->update($request->all(), $id);

        Flash::success('Ikan updated successfully.');

        return redirect(route('ikans.index'));
    }

    /**
     * Remove the specified Ikan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            Flash::error('Ikan not found');

            return redirect(route('ikans.index'));
        }

        $this->ikanRepository->delete($id);

        Flash::success('Ikan deleted successfully.');

        return redirect(route('ikans.index'));
    }
}
