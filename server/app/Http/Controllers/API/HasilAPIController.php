<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIkanAPIRequest;
use App\Http\Requests\API\UpdateIkanAPIRequest;
use App\Models\Ikan;
use App\Models\Jenisparameter;
use App\Models\Unit;
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

class HasilAPIController extends AppBaseController
{
    
    public function store(Request $request)
    {
        $input=$request->all();
        $unit=Unit::find($input['unit_id']);
        $jenis_parameter=Jenisparameter::find($input['jenis_parameter_id']);
        $unit->Jenisparameter()->attach($jenis_parameter,['value'=>$input['value']]);
        return $this->sendResponse($unit->toArray(), message: 'unit saved successfully');
    }
    
}
