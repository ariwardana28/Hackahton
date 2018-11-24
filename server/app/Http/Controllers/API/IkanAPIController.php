<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIkanAPIRequest;
use App\Http\Requests\API\UpdateIkanAPIRequest;
use App\Models\Ikan;
use App\Repositories\IkanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IkanController
 * @package App\Http\Controllers\API
 */

class IkanAPIController extends AppBaseController
{
    /** @var  IkanRepository */
    private $ikanRepository;

    public function __construct(IkanRepository $ikanRepo)
    {
        $this->ikanRepository = $ikanRepo;
    }

    /**
     * Display a listing of the Ikan.
     * GET|HEAD /ikans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ikanRepository->pushCriteria(new RequestCriteria($request));
        $this->ikanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ikans = $this->ikanRepository->all();

        return $this->sendResponse($ikans->toArray(), 'Ikans retrieved successfully');
    }

    /**
     * Store a newly created Ikan in storage.
     * POST /ikans
     *
     * @param CreateIkanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIkanAPIRequest $request)
    {
        $input = $request->all();

        $ikans = $this->ikanRepository->create($input);

        return $this->sendResponse($ikans->toArray(), 'Ikan saved successfully');
    }

    /**
     * Display the specified Ikan.
     * GET|HEAD /ikans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ikan $ikan */
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            return $this->sendError('Ikan not found');
        }

        return $this->sendResponse($ikan->toArray(), 'Ikan retrieved successfully');
    }

    /**
     * Update the specified Ikan in storage.
     * PUT/PATCH /ikans/{id}
     *
     * @param  int $id
     * @param UpdateIkanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIkanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ikan $ikan */
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            return $this->sendError('Ikan not found');
        }

        $ikan = $this->ikanRepository->update($input, $id);

        return $this->sendResponse($ikan->toArray(), 'Ikan updated successfully');
    }

    /**
     * Remove the specified Ikan from storage.
     * DELETE /ikans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ikan $ikan */
        $ikan = $this->ikanRepository->findWithoutFail($id);

        if (empty($ikan)) {
            return $this->sendError('Ikan not found');
        }

        $ikan->delete();

        return $this->sendResponse($id, 'Ikan deleted successfully');
    }
}
