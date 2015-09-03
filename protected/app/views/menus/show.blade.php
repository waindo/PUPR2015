@extends('layouts.mastermenu')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Showing {{ $menu->name }}</h1>
 
    <div class="jumbotron text-center">
        <h2>{{ $menu->menu }}</h2>
        <p>
            <strong>Menu:</strong> {{ $menu->menu }}<br>
            <strong>Url :</strong> {{ $menu->url }}
        </p>
    </div>
 
@stop