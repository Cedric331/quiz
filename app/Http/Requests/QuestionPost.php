<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class QuestionPost extends FormRequest
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
         'question' => 'required|max:255',
         'responseValid' => 'required|max:255',
         'responseError' => 'required|max:255',
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
           'question.required' => 'Le question est manquante',
           'question.max' => 'Le question ne doit pas dépasser 255 caractères',
           'responseValid.required' => 'La bonne réponse est manquante',
           'responseValid.max' => 'Le réponse ne doit pas dépasser 255 caractères',
           'responseError.required' => 'La mauvaise réponse est manquante',
           'responseError.max' => 'Le réponse ne doit pas dépasser 255 caractères',
       ];
   }
}
