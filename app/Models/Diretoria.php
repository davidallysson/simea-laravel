<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diretoria extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome', 'campus_id'
  ];

  public function campus()
  {
      return $this->belongsTo('App\Models\Campus');
  }

  public function cursos()
  {
      return $this->hasMany('App\Models\Curso');
  }

}
