@extends('layouts.mastergroup')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Showing {{ $group->name }}</h1>
 
    <div class="jumbotron text-center">
        <h2>{{ $group->group }}</h2>
        <p>
            <strong>ID Group:</strong> {{ $group->id_group }}<br>
            <strong>Group :</strong>   {{ $group->group }}
        </p>
    </div>
 
@stop