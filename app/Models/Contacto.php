<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    // protected $table ="contactos";

    protected $table = 'contactos';

    protected $fillable =[
        'perfil',
        'nombre',
        'apellido',
        'telefono',
        'fijo',
        'email',
        'direccion',
        'sexo',
        'trabajo',
        'region',
        'descripcion',
        'grupo_id'
    ];

    // relacion entre usuario y contacto
    public function usuario(){
        return $this->belongsTo(usuario::class);
    }

        // relacion entre grupo y contacto
        public function grupos(){
        return $this->hasMany(Grupo::class,'contacto
        ');
    }



    

}
