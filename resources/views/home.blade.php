@extends('master')

@section('title','Home')

@section('content')
    <h1>home</h1>
    @for ($i = 0; $i < 10; $i++) 
        <span>{{ $i }}</span>
        <hr />
    @endfor
@stop