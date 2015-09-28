@extends('_layouts.layouthome')
@section('contenthome')
	<br/>
	{{ Form::open(array('route' => 'post-buatcodes')) }}
		<table>		
		<div class="form-group">
			<tr>	
				<td width="100">{{ Form::label('codesxdesc1xx', 'Jenis (IND)') }}</td>
				<td>{{ Form::text('codesxdesc1xx', null, array('placeholder' => 'Jenis (IND)', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('codesxdesc1xx'))
						<small>{{ $errors->first('codesxdesc1xx') }}</small>
					@endif
				</td>
			</tr>
		</div>
		<div class="form-group">
			<tr>	
				<td>{{ Form::label('codesxdesc2xx', 'Jenis (ENG)') }}</td>
				<td>{{ Form::text('codesxdesc2xx', null, array('placeholder' => 'Jenis (ENG)', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('codesxdesc2xx'))
						<small>{{ $errors->first('codesxdesc2xx') }}</small>
					@endif
				</td>
			</tr>	
		</div>		
		</table>
			<br>
		<p id="tengah">{{ Form::submit('Tambah', array('class' => 'btn btn-small btn-info')) }} <a href="{{ route('berandacodes') }}" class="btn btn-small btn-info">Kembali</a></p>
	{{ Form::close() }}
@stop