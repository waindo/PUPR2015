@extends('_layouts.layouthome')
@section('contenthome')
	@if($group)
		<br/>
		<br>
		{{ Form::open(array('route' => array('post-ubahgroup', $group->id))) }}
			<table>
				<tr>
					<td width="70">{{ Form::label('groupxgroupid', 'Group ID') }}</td>
					<td>{{ Form::text('groupxgroupid', $group->groupxgroupid, array('placeholder' => 'Group ID', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('groupxgroupid'))<small>{{ $errors->first('groupxgroupid') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('groupxgroupxx', 'Group') }}</td>
					<td>{{ Form::text('groupxgroupxx', $group->groupxgroupxx, array('placeholder' => 'Group' , 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('groupxgroupxx'))<small>{{ $errors->first('groupxgroupxx') }}</small>@endif</td>
				</tr>				
			</table>
			<br>
			<p id="tengah">{{ Form::submit('Ubah Data', array('class' => 'btn btn-small btn-info')) }} <a href="{{ route('berandagroup') }}" class="btn btn-small btn-info">Kembali</a></p>
		{{ Form::close() }}
	@else
		<p id="tengah">ID Sungai tidak ditemukan.</p>
	@endif
@stop