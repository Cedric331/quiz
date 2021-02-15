<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'name' => ['required', 'string', 'max:255', 'alpha'],
         'email' => ['required', 'string', 'email', 'max:255'],
         'subject' => ['required', 'string'],
         'message' => ['required', 'string'],
         'g-recaptcha-response' => ['required','captcha']
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
           'g-recaptcha-response.required' => 'Le captcha est requis',
           'g-recaptcha-response.captcha' => 'Le captcha est incorrect',
       ];
   }
}
