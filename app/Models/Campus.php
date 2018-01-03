<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome'
  ];

  public function diretorias()
  {
      return $this->hasMany('App\Models\Diretoria');
  }

}
