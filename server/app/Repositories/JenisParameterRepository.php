<?php

namespace App\Repositories;

use App\Models\JenisParameter;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisParameterRepository
 * @package App\Repositories
 * @version November 24, 2018, 8:46 am UTC
 *
 * @method JenisParameter findWithoutFail($id, $columns = ['*'])
 * @method JenisParameter find($id, $columns = ['*'])
 * @method JenisParameter first($columns = ['*'])
*/
class JenisParameterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisParameter::class;
    }
}
