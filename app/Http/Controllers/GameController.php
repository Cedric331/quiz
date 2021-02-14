<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Question;
use Inertia\Inertia;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GameController extends Controller
{
   /**
    * Affiche la page avec les quiz qui sont disponibles
    *
    * @return void
    */
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

    /**
     * Permet de réactualiser les informations de la page
     *
     * @return void
     */
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

    /**
     * Affiche la vue pour jouer à un quiz
     *
     * @param [type] $id
     * @return void
     */
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

    /**
     * Augmente le compteur du quiz
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Permet de supprimer un quiz
     *
     * @param [type] $id
     * @return void
     */
    public function deleteQuiz($id)
    {
      $questionnaire = Questionnaire::findOrFail($id);

      if (Gate::allows('questionnaire-edit', $questionnaire)) {

        $questionnaire->delete();

        $questionnaires = Questionnaire::where('user_id', Auth::user()->id)->get();
        return response()->json($questionnaires, 200);
      }
      else {
         return response()->json('Action non autorisée', 401);
      }
    }
}
