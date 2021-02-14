<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function index()
   {
      return Inertia::render('Account', [
         'show-quiz' => URL::route('show-quiz'),
         'quiz' => URL::route('quiz-index')
     ]);
   }

   public function update(Request $request)
   {
      $request->validate([
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      ]);

      User::where('id', Auth::user()->id)
            ->update(['name' => $request->name,'email' => $request->email]);

   }

   public function delete()
   {
      User::findOrFail(Auth::user()->id)->delete();

      return Inertia::render('Home', [
         'url' => URL::route('login'),
         'quiz' => URL::route('quiz-index')
     ]);
   }
}
