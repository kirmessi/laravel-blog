
@extends('user.app')

@section('bg-img','user/img/login.jpg')

@section('head')



@endsection

@section('title', 'Welcome '. Auth::user()->name)
@section('sub-title', '')

@section('main-content')

 <article>
      <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">


        </div>


        </div>
      </div>
    </article>

    <hr>
@endsection


