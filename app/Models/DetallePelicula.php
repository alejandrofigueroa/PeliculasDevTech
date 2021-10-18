<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallePelicula
 *
 * @property $id
 * @property $pelicula_id
 * @property $sinopsis
 * @property $genero
 * @property $director
 * @property $created_at
 * @property $updated_at
 *
 * @property Pelicula $pelicula
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetallePelicula extends Model
{
    
    static $rules = [
		'pelicula_id' => 'required',
		'sinopsis' => 'required',
		'genero' => 'required',
		'director' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pelicula_id','sinopsis','genero','director'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'id', 'pelicula_id');
    }
    

}
