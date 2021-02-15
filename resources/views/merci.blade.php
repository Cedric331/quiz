@extends('layouts.app')

@section('content')
<div class="container my-5">
   <section class="text-center dark-grey-text mb-5">
     <div class="card">
       <div class="card-body rounded-top border-top p-5 bg-dark">
         <div class="row d-flex justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body text-center">
                  <h3 class="font-weight-bold">Merci</h3>
                  <p>Votre message à bien été envoyé</p>
                  <a class="btn btn-outline-dark" href="{{ route('home') }}">Revenir au menu</a>
                </div>
              </div>
            </div>
          </div>

       </div>
     </div>
   </section>
 </div>

 @endsection