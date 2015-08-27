@extends('layouts.mastergroupmenu')
 
@section('navbar')
@parent
 
@stop
 
@section('content')
 
<h1>Showing {{ $groupmenu->name }}</h1>
 
    <div class="jumbotron text-center">
        <h2>{{ $groupmenu->groupmenu }}</h2>
        <p>
            <strong>ID Group:</strong>   {{ $groupmenu->id_group }}<br>
            <strong>ID Menu :</strong>   {{ $groupmenu->id_menu }}
        </p>
    </div>
 
@stop