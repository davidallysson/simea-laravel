<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome', 'curso_id'
  ];

  public function curso()
  {
      return $this->belongsTo('App\Models\Curso');
  }

  public function alunos()
  {
      return $this->hasMany('App\Models\Pessoa');
  }
}
