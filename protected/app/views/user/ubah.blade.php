@extends('_layouts.layouthome')
@section('contenthome')
	@if($user)
		<br/>
		<br/>		
		
		{{ Form::model($user, array('route' => array('post-ubahuser', $user->id))) }}
			<table>
				<tr>
					<td>{{ Form::label('usersxuseridx', 'User ID') }}</td>
					<td>{{ Form::text('usersxuseridx', $user->usersxuseridx, array('placeholder' => 'User ID', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('usersxuseridx'))<small>{{ $errors->first('usersxuseridx') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('usersxusernam', 'User Name') }}</td>
					<td>{{ Form::text('usersxusernam', $user->usersxusernam, array('placeholder' => 'User Name', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('usersxusernam'))<small>{{ $errors->first('usersxusernam') }}</small>@endif</td>
				</tr>	
				<tr>	
					<td>{{ Form::label('usersxemailxx', 'Email') }}</td>
					<td>{{ Form::text('usersxemailxx', $user->usersxemailxx, array('placeholder' => 'Email', 'class' => 'form-control')) }}</td>
					<td>@if($errors->has('usersxemailxx'))<small>{{ $errors->first('usersxemailxx') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('passwordv', 'Password Baru') }}</td>
					<td>{{ Form::password('passwordv', array('class' => 'form-control')) }}</td>
					<td>@if($errors->has('passwordv'))<small>{{ $errors->first('passwordv') }}</small>@endif</td>
				</tr>
				<tr>	
					<td>{{ Form::label('usersxlevelxx', 'Level') }}</td>
					<td>{{ Form::select('usersxlevelxx', array('Admin' => 'Admin', 'User' => 'User', 'Operator' => 'Operator'), null, array('class' => 'form-control')) }}</td>					
					<td>@if($errors->has('usersxlevelxx'))<small>{{ $errors->first('usersxlevelxx') }}</small>@endif</td>
				</tr>			
			</table>
			<br>
			<p id="tengah">{{ Form::submit('Ubah Data', array('class' => 'tombol', 'class' => 'btn btn-small btn-info')) }} <a href="{{ route('berandauser') }}" class="btn btn-small btn-info">Kembali</a></p>
		{{ Form::close() }}
	@else
		<p id="tengah">ID User tidak ditemukan.</p>
	@endif
@stop