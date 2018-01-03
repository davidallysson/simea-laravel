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
      'letra', 'peso'
  ];

  public function questao()
  {
      return $this->belongsTo('App\Models\Questao');
  }
}
