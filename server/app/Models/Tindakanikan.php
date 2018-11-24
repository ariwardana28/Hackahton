<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tindakanikan
 * @package App\Models
 * @version November 23, 2018, 7:15 am UTC
 *
 * @property \App\Models\JenisParameter jenisParameter
 * @property \App\Models\Ikan ikan
 * @property \App\Models\Tindakan tindakan
 * @property \Illuminate\Database\Eloquent\Collection hasil
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer tindakan_id
 * @property integer jenis_parameter_id
 * @property float limit_atas
 * @property float limit_bawah
 */
class Tindakanikan extends Model
{
    use SoftDeletes;

    public $table = 'tindakan_ikan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'tindakan_id',
        'jenis_parameter_id',
        'limit_atas',
        'limit_bawah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ikan_id' => 'integer',
        'tindakan_id' => 'integer',
        'jenis_parameter_id' => 'integer',
        'limit_atas' => 'float',
        'limit_bawah' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisParameter()
    {
        return $this->belongsTo(\App\Models\JenisParameter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ikan()
    {
        return $this->belongsTo(\App\Models\Ikan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tindakan()
    {
        return $this->belongsTo(\App\Models\Tindakan::class);
    }
}
