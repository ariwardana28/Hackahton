<?php

namespace App\Repositories;

use App\Models\Ikan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IkanRepository
 * @package App\Repositories
 * @version November 23, 2018, 2:10 pm UTC
 *
 * @method Ikan findWithoutFail($id, $columns = ['*'])
 * @method Ikan find($id, $columns = ['*'])
 * @method Ikan first($columns = ['*'])
*/
class IkanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'gambar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ikan::class;
    }
}
