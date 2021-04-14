<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
        'titulo','imagen','descripcion','skills','categoria_id','experiencia_id',
        'ubicacion_id','salario_id'
    ];

    // Relacione 1:1
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    // Relacione 1:1
    public function salario(){
        return $this->belongsTo(Salario::class);
    }
    // Relacione 1:1
    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }
    // Relacione 1:1
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
    // Relacione 1:1
    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }

    // Relacion 1:n vacante y candidatos
    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }

}


