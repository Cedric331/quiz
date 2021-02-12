<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class QuizQuestionnairePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       if (Auth::check()) {
            return true;
       }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
         'titre' => 'required|unique:questionnaires|max:255',
         'theme' => 'required',
     ];
    }

      /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
   public function messages()
   {
       return [
           'titre.required' => 'Le titre est requis',
           'titre.unique' => 'Le titre est déjà pris',
           'titre.max' => 'Le titre ne doit pas dépasser 255 caractères',
           'theme.required' => 'Le thème est requis',
       ];
   }
}
