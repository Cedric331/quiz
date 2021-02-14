<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function index()
   {
      return Inertia::render('Account', [
         'show-quiz' => URL::route('show-quiz'),
         'quiz' => URL::route('quiz-index'),
         'information' => URL::route('user-information')
     ]);
   }

   public function information()
   {
      return Inertia::render('Information', [
         'name' => Auth::user()->name,
         'email' => Auth::user()->email,
         'id' => Auth::user()->id,
     ]);
   }

   public function update(Request $request)
   {
      if ($request->name != Auth::user()->name) {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
         ]);
      }
      if ($request->email != Auth::user()->email) {
         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         ]);
      }
      if ($request->email != Auth::user()->email || $request->name != Auth::user()->name) {
         $user = User::findOrFail(Auth::user()->id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->save();
      return response()->json(null ,200);
      } else{
         return response()->json(null ,201);
      }
   }

   public function delete(Request $request)
   {
      $user = User::find($request->id);
      $user->delete();
   }
}
