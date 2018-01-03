<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'pontos', 'pessoa_id', 'questionario_id'
  ];

  public function aluno()
  {
      return $this->belongsTo('App\Models\Pessoa');
  }

  public function questionario()
  {
      return $this->belongsTo('App\Models\Questionario');
  }

}
