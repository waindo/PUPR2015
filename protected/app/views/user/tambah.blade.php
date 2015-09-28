@extends('_layouts.layouthome')
@section('contenthome')
	<br/>
	{{ Form::open(array('route' => 'post-buatgroup')) }}
		<table>
			<tr>
				<td>{{ Form::label('groupxgroupid', 'Group ID') }}</td>
				<td>{{ Form::text('groupxgroupid', null, array('placeholder' => 'Group ID')) }}</td>
				<td>
					@if($errors->has('groupxgroupid'))
						<small>{{ $errors->first('groupxgroupid') }}</small>
					@endif
				</td>
			</tr>
			<tr>	
				<td>{{ Form::label('groupxgroupxx', 'Group') }}</td>
				<td>{{ Form::text('groupxgroupxx', null, array('placeholder' => 'Group')) }}</td>
				<td>
					@if($errors->has('groupxgroupxx'))
						<small>{{ $errors->first('groupxgroupxx') }}</small>
					@endif
				</td>
			</tr>
			</table>
		<p id="tengah">{{ Form::submit('Tambah', array('class' => 'tombol')) }}</p>
	{{ Form::close() }}
@stop