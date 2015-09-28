@extends('_layouts.layouthome')
@section('contenthome')
	<br/>
	<br>
	{{ Form::open(array('route' => 'post-buatcodesdetail', $codes->id)) }}
		<table>		
			<tr>
			   <td>{{ Form::hidden('codesxheadxxx', $codes->codesxheadxxx, array('placeholder' => 'Desc 1', 'class' => 'form-control')) }}</td>
			</tr>
			<tr>	
				<td width="70">{{ Form::label('codesxdesc1xx', 'Desc 1') }}</td>
				<td>{{ Form::text('codesxdesc1xx', null, array('placeholder' => 'Desc 1', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('codesxdesc1xx'))
						<small>{{ $errors->first('codesxdesc1xx') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('codesxdesc2xx', 'Desc 2') }}</td>
				<td>{{ Form::text('codesxdesc2xx', null, array('placeholder' => 'Desc 2', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('codesxdesc2xx'))
						<small>{{ $errors->first('codesxdesc2xx') }}</small>
					@endif
				</td>
			</tr>			
			</table>
			<br>
		<p id="tengah">{{ Form::submit('Tambah', array('class' => 'btn btn-small btn-info')) }} <a href="{{ URL::previous() }}" class="btn btn-small btn-info">Kembali</a></p>
	{{ Form::close() }}
@stop