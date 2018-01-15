<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'motivos', 'resposta', 'pessoa_id'
  ];

  public function aluno()
  {
      return $this->belongsTo('App\User');
  }

}
