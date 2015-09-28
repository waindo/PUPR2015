@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Group terdaftar --}}
	@if(count($cari))
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
			<th style="width:200px">User ID</th>
			<th style="width:350px">User Name</th>
			<th style="width:200px">Email</th>
			<th style="width:350px">Level</th>						
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
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
		</table>


	{{-- Bila Group tidak ada --}}
	@else
		<h3 id="tengah">
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('berandauser') }}" class="btn btn-small btn-info">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table class="table table-striped table-bordered">			
			<th style="width:200px">User ID</th>
			<th style="width:350px">User Name</th>
			<th style="width:200px">Email</th>
			<th style="width:350px">Level</th>				
			@foreach($daftar as $temp)
				<tr>					
					<td>{{ $temp->usersxuseridx }}</td>
					<td>{{ $temp->usersxusernam }}</td>					
					<td>{{ $temp->usersxemailxx }}</td>	
					<td>{{ $temp->usersxlevelxx }}</td>					
				</tr>
			@endforeach
		</table>
		@endif
	@endif
@stop