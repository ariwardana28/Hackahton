<?php

namespace App\Repositories;

use App\Models\Tindakanikan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TindakanikanRepository
 * @package App\Repositories
 * @version November 23, 2018, 7:15 am UTC
 *
 * @method Tindakanikan findWithoutFail($id, $columns = ['*'])
 * @method Tindakanikan find($id, $columns = ['*'])
 * @method Tindakanikan first($columns = ['*'])
*/
class TindakanikanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tindakan_id',
        'jenis_parameter_id',
        'limit_atas',
        'limit_bawah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tindakanikan::class;
    }
}
