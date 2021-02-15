<?php

namespace App\Http\Controllers;

use App\Mail\PostContact;
use App\Http\Requests\ContactPost;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
         return view('contact');
    }

    public function send(ContactPost $request)
    {
      $request->validated();

      Mail::to(env('APP_MAIL'))->queue(new PostContact($request->except('_token')));

      return view('merci');
    }
}
