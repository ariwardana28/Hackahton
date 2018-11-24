<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 * @package App\Models
 * @version November 24, 2018, 8:47 am UTC
 *
 * @property \App\Models\Ikan ikan
 * @property \Illuminate\Database\Eloquent\Collection hasil
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string nama
 * @property integer katalog_ikan_id
 */
class Unit extends Model
{
    use SoftDeletes;

    public $table = 'unit';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'katalog_ikan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'katalog_ikan_id' => 'integer'
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
    public function ikan()
    {
        return $this->belongsTo(\App\Models\Ikan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function jenisParameters()
    {
        //return $this->belongsToMany(\App\Models\JenisParameter::class, 'hasil');
        return $this->belongsToMany(\App\Models\JenisParameter::class, 'hasil')
            ->using(\App\Models\Hasil::class)
            ->withPivot([
                'value'
            ])->withTimestamps();
    }
}
