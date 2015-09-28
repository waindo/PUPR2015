@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila User terdaftar --}}
	<br>
	<br>
	@if(count($daftar))
		
	{{ Form::open(array('route' => 'cari-user', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control',)) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	{{ Form::close() }}	
	 

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td style="width:1500px"> <a href="{{ route('urut-user', 'usersxuseridx') }}">User ID</a></td>
					<td style="width:1500px"><a href="{{ route('urut-user', 'usersxusernam') }}">User Name</a></td>						
					<td style="width:1500px"> <a href="{{ route('urut-user', 'usersxemailxx') }}">Email</a></td>			
					<td style="width:1500px"> <a href="{{ route('urut-user', 'usersxlevelxx') }}">Level</a></td>			
					<td style="width:5000px">Aksi</th>
			    </tr>
    		</thead>
    		<tbody>
			@foreach($daftar as $temp)
				<tr>
					<td>{{ $temp->usersxuseridx }}</td>
					<td>{{ $temp->usersxusernam }}</td>					
					<td>{{ $temp->usersxemailxx }}</td>	
					<td>{{ $temp->usersxlevelxx }}</td>		
					  
									
					<td><small> {{ link_to_route('ubahuser', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
								{{ link_to_route('hapususer', 'Hapus', array($temp->id), array('class' => 'btn btn-small btn-info')) }}					        
					</small></td>					
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $daftar->links() }}
		
	{{-- Bila User tidak ada --}}
	@else
		<p id="tengah">Maaf, Anda belum memiliki data User. </p>
	@endif
@stop