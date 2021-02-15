@extends('layouts.app')

@section('content')
<div class="container my-5">
   <section class="text-center dark-grey-text mb-5">
     <div class="card">
       <div class="card-body rounded-top border-top p-5">
         <h3 class="font-weight-bold my-4">Contact</h3>
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
         @endif
         <form class="mb-4 mx-md-5" action="" method="POST">
            @csrf
           <div class="row">
             <div class="col-md-6 mb-4">
               <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nom">
 
             </div>
             <div class="col-md-6 mb-4">
               <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
             </div>
           </div>
 
           <div class="row">
             <div class="col-md-12 mb-4">
               <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Sujet">
             </div>
           </div>
 
           <div class="row">
             <div class="col-md-12">
 
               <div class="form-group mb-4">
                 <textarea class="form-control rounded" name="message" rows="3" placeholder="Votre message?">{{ old('message') }}</textarea>
               </div>

               <div class="col-md-12 d-flex justify-content-center text-center mt-5 mb-3">
                  {!! NoCaptcha::display(['data-theme' => 'light']) !!}
               </div>
 
               <div class="text-center">
                 <button type="submit" class="btn btn-info btn-md">Envoyer</button>
               </div>
 
             </div>
           </div>
         </form>
       </div>
     </div>
   </section>
 </div>

 @endsection