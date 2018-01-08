<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'titulo', 'eixo_id', 'questionario_id'
  ];

  public function eixo()
  {
      return $this->belongsTo('App\Models\Eixo');
  }

  public function alternativas()
  {
      return $this->hasMany('App\Models\Alternativa');
  }

  public function questionario()
  {
      return $this->belongsTo('App\Models\Questionario');
  }
}
