@extends('_layouts.layouthome')
@section('contenthome')
	<br/>
	<br>
	{{ Form::open(array('route' => 'post-buatdas')) }}
		<table>
			<tr>	
				<td width="100">{{ Form::label('dasxxxkodewsx', 'Nama WS') }}</td>
				<td>{{Form::select('dasxxxkodewsx', $kdws, null, array('id' => 'skdws', 'class' => 'form-control', 'style'=>'width: 200px'))  }}</td>
				<td>
					@if($errors->has('dasxxxkodewsx'))
						<small>{{ $errors->first('dasxxxkodewsx') }}</small>
					@endif
				</td>				
			</tr>
			<tr>	
				<td>{{ Form::label('dasxxxkodedas', 'Kode Das') }}</td>
				<td>{{ Form::text('dasxxxkodedas', null, array('placeholder' => 'Kode Das' , 'style'=>'width: 200px', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('dasxxxkodedas'))
						<small>{{ $errors->first('dasxxxkodedas') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('dasxxxnamadas', 'Nama Das') }}</td>
				<td>{{ Form::text('dasxxxnamadas', null, array('placeholder' => 'Nama Das' , 'style'=>'width: 200px', 'class' => 'form-control' )) }}</td>
				<td>
					@if($errors->has('dasxxxnamadas'))
						<small>{{ $errors->first('dasxxxnamadas') }}</small>
					@endif
				</td>
			</tr>
		</table>
		<br>
		<p id="tengah">{{ Form::submit('Tambah', array('class' => 'btn btn-small btn-info')) }}      <a href="{{ route('berandadas') }}" class="btn btn-small btn-info">Kembali</a></p>
	{{ Form::close() }}
@stop