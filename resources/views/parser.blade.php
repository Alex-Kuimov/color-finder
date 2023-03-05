@extends('layouts.app')

@section('title', 'Парсер')

@section('content')

<div style="width:100px; height: 100px; background:{{$find}}">{{$find}}</div>

@foreach ($colors as $color)
    <p></p>
    <div style="width:100px; height: 100px; background:{{$color[0]}}">{{$color[0]}}</div>
    <div style="width:100px; height: 100px; background:{{$color[1]}}">{{$color[1]}}</div>
@endforeach
@endsection
