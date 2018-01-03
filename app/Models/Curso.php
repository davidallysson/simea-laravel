<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome', 'diretoria_id'
  ];

  public function diretoria()
  {
      return $this->belongsTo('App\Models\Diretoria');
  }

  public function turmas()
  {
      return $this->hasMany('App\Models\Turma');
  }
}
