<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 *
 * @property $id
 * @property $titulo
 * @property $foto
 * @property $fecha_estreno
 * @property $categoria_id
 * @property $disponible
 * @property $stock
 * @property $precio_renta
 * @property $precio_compra
 * @property $created_at
 * @property $updated_at
 *
 * @property Accione[] $acciones
 * @property Categoria $categoria
 * @property DetallePelicula[] $detallePeliculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pelicula extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'fecha_estreno' => 'required',
		'categoria_id' => 'required',
		'disponible' => 'required',
		'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','foto','fecha_estreno','categoria_id','disponible','stock','precio_renta','precio_compra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acciones()
    {
        return $this->hasMany('App\Models\Accione', 'pelicula_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallePeliculas()
    {
        return $this->hasMany('App\Models\DetallePelicula', 'pelicula_id', 'id');
    }
    

}
