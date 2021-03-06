<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'titre', 'user_id', 'theme_id'
  ];

  public function numberQuestion()
  {
     return $this->hasMany(Question::class);
  }

  public function theme()
  {
    return $this->belongsTo(Theme::class);
  }
}
