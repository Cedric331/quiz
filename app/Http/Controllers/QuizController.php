<?php

namespace App\Http\Controllers;

use App\Theme;
use Inertia\Inertia;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create()
    {
      $themes = json_encode(Theme::All());
      
       return Inertia::render('CreateQuiz',[
         'themes' => $themes
     ]);
    }
}
