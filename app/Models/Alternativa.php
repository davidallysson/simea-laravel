<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'alternativa', 'letra', 'peso', 'questao_id'
  ];

  public function questao()
  {
      return $this->belongsTo('App\Models\Questao');
  }
}
