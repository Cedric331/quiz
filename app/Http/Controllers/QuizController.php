<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Question;
use Inertia\Inertia;
use App\Questionnaire;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\QuizQuestionnairePost;

class QuizController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function show()
    {
      $themes = Theme::All();

       return Inertia::render('CreateQuiz',[
         'themes' => $themes
     ]);
    }

    public function create(QuizQuestionnairePost $request)
    {
      $request->validated();

      $questionnaire = new Questionnaire;
      $questionnaire->titre = $request->titre;
      $questionnaire->theme_id = $request->theme;
      $questionnaire->user_id = Auth::user()->id;
      $questionnaire->save();

      return response()->json($questionnaire->id, 200);
    }

    public function createQuestions($id)
    {
      $questionnaire = Questionnaire::findOrFail($id);

      if (Gate::allows('questionnaire-edit', $questionnaire)) {

         return Inertia::render('CreateQuestion', [
            'questionnaire' => $questionnaire,
            'number' => $questionnaire->nombre_question
         ]);
     }
    }

    public function addQuestions(QuestionPost $request, $id)
    {
      $questionnaire = Questionnaire::findOrFail($id);
      dd($request);

      if (Gate::allows('questionnaire-edit', $questionnaire)) {
            $question = new Question;
            $question->questionnaire_id = $questionnaire->id;
            $question->question = $request->question;
            $question->reponse = $request->responseValid;
            $question->mauvaise_reponse = $request->responseError;

         return response()->json($questionnaire->nombre_question, 200);
     }
    }
}
