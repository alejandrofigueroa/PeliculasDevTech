<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 *
 * @property $id
 * @property $nombre_categoria
 * @property $descripcion_categoria
 * @property $created_at
 * @property $updated_at
 *
 * @property Pelicula[] $peliculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
{
    
    static $rules = [
		'nombre_categoria' => 'required',
		'descripcion_categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_categoria','descripcion_categoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peliculas()
    {
        return $this->hasMany('App\Models\Pelicula', 'categoria_id', 'id');
    }
    

}
