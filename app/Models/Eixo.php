<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome'
  ];

  public function questoes()
  {
      return $this->hasMany('App\Models\Questao');
  }
}
