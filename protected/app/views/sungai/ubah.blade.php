@extends('_layouts.layouthome')
@section('contenthome')
	@if($sungai)
		<br/>
		<br>		
		{{ Form::model($sungai, array('route' => array('post-ubah', $sungai->id))) }}
			<table>
				<tr>
					<td width="100">{{ Form::label('sungaikodedas', 'Kode Das') }}</td>					
					<td>{{Form::select('sungaikodedas', $kddas, null, array('id' => 'skddas', 'class' => 'form-control', 'style'=>'width: 200px'))  }}</td>
					<td>@if($errors->has('sungaikodedas'))<small>{{ $errors->first('sungaikodedas') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('sungaikodesng', 'Kode Sungai') }}</td>
					<td>{{ Form::text('sungaikodesng', $sungai->sungaikodesng, array('placeholder' => 'Kode Sungai', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('sungaikodesng'))<small>{{ $errors->first('sungaikodesng') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('sungainamasng', 'Nama Sungai') }}</td>
					<td>{{ Form::text('sungainamasng', $sungai->sungainamasng, array('placeholder' => 'Kode Sungai', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('sungainamasng'))<small>{{ $errors->first('sungainamasng') }}</small>@endif</td>
				</tr>
			</table>
			<br>
			<p id="tengah">{{ Form::submit('Ubah Data', array('class' => 'btn btn-small btn-info')) }} <a href="{{ route('beranda') }}" class="btn btn-small btn-info">Kembali</a></p>
		{{ Form::close() }}
	@else
		<br>
		<p id="tengah">ID Sungai tidak ditemukan.</p>
	@endif
@stop