<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome', 'sexo', 'telefone', 'matricula', 'dataNascimento', 'estadoCivil', 'raca', 'renda', 'turma_id'
  ];

  public function turma()
  {
      return $this->belongsTo('App\Models\Turma');
  }

  public function resultados()
  {
      return $this->hasMany('App\Models\Resultado');
  }

}
