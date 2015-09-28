@extends('_layouts.layouthome')
@section('contenthome')
<br>
	@if($das)
		<br/>		
		{{ Form::model($das, array('route' => array('post-ubahdas', $das->id))) }}
			<table>
				<tr>
					<td width="100">{{ Form::label('dasxxxkodewsx', 'Nama WS') }}</td>
					<td>{{Form::select('dasxxxkodewsx', $kdws, null, array('id' => 'skdws', 'class' => 'form-control', 'style'=>'width: 200px'))  }}</td>
					<td>@if($errors->has('dasxxxkodewsx'))<small>{{ $errors->first('dasxxxkodewsx') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('dasxxxkodedas', 'Kode Das') }}</td>
					<td>{{ Form::text('dasxxxkodedas', $das->dasxxxkodedas, array('placeholder' => 'Kode Das' , 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('dasxxxkodedas'))<small>{{ $errors->first('dasxxxkodedas') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('dasxxxnamadas', 'Nama Das') }}</td>
					<td>{{ Form::text('dasxxxnamadas', $das->dasxxxnamadas, array('placeholder' => 'Nama Das', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('dasxxxnamadas'))<small>{{ $errors->first('dasxxxnamadas') }}</small>@endif</td>
				</tr>
			</table>
			<br>
			<p id="tengah">{{ Form::submit('Ubah Data', array('class' => 'btn btn-small btn-info')) }} <a href="{{ route('berandadas') }}" class="btn btn-small btn-info">Kembali</a></p>
		{{ Form::close() }}
	@else
		<p id="tengah">ID Das tidak ditemukan.</p>
	@endif
@stop