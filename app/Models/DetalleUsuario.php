<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleUsuario
 *
 * @property $id
 * @property $user_id
 * @property $nombre_usuario
 * @property $apellido_usuario
 * @property $dui
 * @property $departamento
 * @property $ciudad
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetalleUsuario extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'nombre_usuario' => 'required',
		'apellido_usuario' => 'required',
		'dui' => 'required',
		'departamento' => 'required',
		'ciudad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','nombre_usuario','apellido_usuario','dui','departamento','ciudad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
