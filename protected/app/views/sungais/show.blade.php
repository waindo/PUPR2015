@extends('layouts.layouthome')
 
@section('contenthome')
@parent
 
@stop
 
@section('contenthome')
 
<h1>Showing {{ $sungai->sungainamasng }}</h1>
 
    <div class="jumbotron text-center">
        <h2>{{ $sungai->sungainamasng }}</h2>
        <p>
        	<strong>Kode DAS  :</strong> {{ $sungai->sungaikodedas }}<br>
            <strong>Nama DAS :</strong> {{ $sungai->sungainamasng }}<br>
            <strong>Kode Sungai  :</strong> {{ $sungai->sungaikodesng }}<br>
            <strong>Nama Sungai :</strong> {{ $sungai->sungainamasng }}
        </p>
    </div>
 
@stop