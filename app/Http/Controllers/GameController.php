<?php

namespace App\Http\Controllers;

use App\Theme;
use Inertia\Inertia;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
}
