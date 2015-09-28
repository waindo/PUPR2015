@extends('_layouts.layouthome')
@section('contenthome')
	<br/>
	<br>
	{{ Form::open(array('route' => 'post-buatgroup')) }}
		<table >
			<tr>
				<td width="70">{{ Form::label('groupxgroupid', 'Group ID') }}</td>
				<td>{{ Form::text('groupxgroupid', null, array('placeholder' => 'Group ID', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('groupxgroupid'))
						<small>{{ $errors->first('groupxgroupid') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('groupxgroupxx', 'Group') }}</td>
				<td>{{ Form::text('groupxgroupxx', null, array('placeholder' => 'Group', 'class' => 'form-control')) }}</td>
				<td>
					@if($errors->has('groupxgroupxx'))
						<small>{{ $errors->first('groupxgroupxx') }}</small>
					@endif
				</td>
			</tr>
			</table>
			<br>
		<p id="tengah">{{ Form::submit('Tambah', array('class' => 'btn btn-small btn-info')) }} <a href="{{ route('berandagroup') }}" class="btn btn-small btn-info">Kembali</a></p>
	{{ Form::close() }}
@stop