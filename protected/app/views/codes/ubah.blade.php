@extends('_layouts.layouthome')
@section('contenthome')
	@if($codes)
		<br/>
		<br>
		{{ Form::open(array('route' => array('post-ubahcodes', $codes->id))) }}
			<table>
				<tr>
					<td width="100">{{ Form::label('codesxdesc1xx', 'Jenis (IND)') }}</td>
					<td>{{ Form::text('codesxdesc1xx', $codes->codesxdesc1xx, array('placeholder' => 'Jenis (IND)' , 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('codesxdesc1xx'))<small>{{ $errors->first('codesxdesc1xx') }}</small>@endif</td>
				</tr>
				<tr>
					<td>{{ Form::label('codesxdesc2xx', 'Jenis (ENG)') }}</td>
					<td>{{ Form::text('codesxdesc2xx', $codes->codesxdesc2xx, array('placeholder' => 'Jenis (END)', 'class' => 'form-control')) }}</td>

					<td>@if($errors->has('codesxdesc2xx'))<small>{{ $errors->first('codesxdesc2xx') }}</small>@endif</td>
				</tr>
				</table>
				<br>
			<p id="tengah">{{ Form::submit('Ubah Data', array('class' => 'btn btn-small btn-info')) }} <a href="{{ route('berandacodes') }}" class="btn btn-small btn-info">Kembali</a></p>
		{{ Form::close() }}
	@else
		<p id="tengah">ID Codes tidak ditemukan.</p>
	@endif
@stop