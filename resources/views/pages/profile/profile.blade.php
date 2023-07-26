@extends('Layout.Layout')

@section("title")
Profile
@endsection

@section("content")
@if (auth()->check())
   <div class="container py-4">
      <h2>Welcome ! {{ auth()->user()->name }}</h2>
   </div>
@endif 
@endsection`