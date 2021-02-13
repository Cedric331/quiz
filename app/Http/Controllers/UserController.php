<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
   public function index()
   {
      return Inertia::render('Account', [
         'show-quiz' => URL::route('show-quiz'),
         'quiz' => URL::route('quiz-index')
     ]);
   }
}
