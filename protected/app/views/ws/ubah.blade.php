@extends('_layouts.layouthome')
@section('contenthome')
	@if($sungai)
		<br/>
		{{ Form::open(array('route' => array('post-ubah', $sungai->id))) }}
			<table>
				<tr>
					<td>{{ Form::label('sungaikodedas', 'Kode Das') }}</td>
					<td>{{ Form::text('sungaikodedas', $sungai->sungaikodedas, array('placeholder' => 'Kode Das')) }}</td>
					<td>@if($errors->has('sungaikodedas'))<small>{{ $errors->first('sungaikodedas') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('sungaikodesng', 'Kode Sungai') }}</td>
					<td>{{ Form::text('sungaikodesng', $sungai->sungaikodesng, array('placeholder' => 'Kode Sungai')) }}</td>
					<td>@if($errors->has('sungaikodesng'))<small>{{ $errors->first('sungaikodesng') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('sungainamasng', 'Nama Sungai') }}</td>
					<td>{{ Form::text('sungainamasng', $sungai->sungainamasng, array('placeholder' => 'Kode Sungai')) }}</td>
					<td>@if($errors->has('sungainamasng'))<small>{{ $errors->first('sungainamasng') }}</small>@endif</td>
				</tr>
			</table>
			<br>
			<p id="tengah">{{ Form::submit('Ubah Data', array('class' => 'tombol')) }} <a href="{{ route('beranda') }}" class="tombol">Kembali</a></p>
		{{ Form::close() }}
	@else
		<p id="tengah">ID Sungai tidak ditemukan.</p>
	@endif
@stop