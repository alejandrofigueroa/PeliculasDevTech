<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Accione
 *
 * @property $id
 * @property $user_id
 * @property $pelicula_id
 * @property $accion
 * @property $fecha_transaccion
 * @property $fecha_renta_final
 * @property $fecha_entrega
 * @property $monto_pago
 * @property $created_at
 * @property $updated_at
 *
 * @property Pelicula $pelicula
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Accione extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'pelicula_id' => 'required',
		'accion' => 'required',
		'fecha_transaccion' => 'required',
		'monto_pago' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','pelicula_id','accion','fecha_transaccion','fecha_renta_final','fecha_entrega','monto_pago'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pelicula()
    {
        return $this->hasOne('App\Models\Pelicula', 'id', 'pelicula_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
