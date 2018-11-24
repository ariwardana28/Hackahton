<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ikan
 * @package App\Models
 * @version November 23, 2018, 2:10 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection hasil
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \App\Models\TindakanIkan tindakanIkan
 * @property \Illuminate\Database\Eloquent\Collection Unit
 * @property string nama
 * @property string gambar
 */
class Ikan extends Model
{
    use SoftDeletes;

    public $table = 'ikan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'gambar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'gambar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function tindakanIkan()
    {
        return $this->hasOne(\App\Models\TindakanIkan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function units()
    {
        return $this->hasMany(\App\Models\Unit::class);
    }
}
