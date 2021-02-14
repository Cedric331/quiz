<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Question;
use Inertia\Inertia;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
      $themes = Theme::all();
      
         $questionnaires = Questionnaire::where('valide', true)
         ->join('themes', 'questionnaires.theme_id','themes.id')
         ->select('themes.titre as theme', 'questionnaires.*')
         ->get();

      foreach ($questionnaires as $questionnaire) {
         $questionnaire->number = $questionnaire->numberQuestion->count();
      }

       return Inertia::render('IndexQuiz', [
         'themes' => $themes,
         'questionnaires' => $questionnaires,
         'url' => URL::route('show-quiz'),
     ]);
    }

    public function questionnaires()
    {
          $questionnaires = Questionnaire::where('valide', true)
            ->join('themes', 'questionnaires.theme_id','themes.id')
            ->select('themes.titre as theme', 'questionnaires.*')
            ->get();

         foreach ($questionnaires as $questionnaire) {
            $questionnaire->number = $questionnaire->numberQuestion->count();
         }
         return response()->json($questionnaires, 200);
    }

    public function quiz($id)
    {
      $questionnaire = Questionnaire::findOrFail($id);

      if ($questionnaire->valide == false) {
         return Inertia::render('Home', [
            'url' => URL::route('login'),
            'quiz' => URL::route('quiz-index')
        ]);
      }

      $questions = Question::where('questionnaire_id', $questionnaire->id)->get();

      return Inertia::render('Quiz', [
         'questionnaire' => $questionnaire,
         'questions' => $questions
     ]);
      
    } 

    public function compteur(Request $request)
    {
      $request->validate([
         'id' => 'required'
      ]);

      if ($request->id == Auth::user()->id) {
         return response()->json(null, 201);
      }

      $questionnaire = Questionnaire::findOrFail($request->id);
      $questionnaire->counter = $questionnaire->counter + 1;
      $questionnaire->save();

      return response()->json(null, 200);
    }

    public function deleteQuiz($id)
    {
      $questionnaire = Questionnaire::findOrFail($id);

      if ($id == Auth::user()->id) {
        $questionnaire->delete();

        return response()->json(null, 200);
      }
      else {
         return response()->json('Action non autorisée', 401);
      }
    }
}
