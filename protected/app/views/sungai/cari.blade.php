@extends('_layouts.layouthome')
@section('contenthome')
	{{-- Bila Sungai terdaftar --}}
	@if(count($cari))
		<br>
		<br>
		{{ Form::open(array('route' => 'cari-sungai', 'style' => 'padding-left:0px;padding-bottom:10px')) }}
		<table>
			<tr>
				<td width="50">{{ Form::label('cari', 'Cari   ') }}</td>  
				<td>{{ Form::text('cari', null, array('placeholder' => 'Cari disini...', 'style' => 'width:200px', 'class' => 'form-control')) }}	</td>							
				<td><small><i>*Tekan Enter</i></small></td>
			</tr>
		</table>			
	    {{ Form::close() }}	
		<table class="table table-striped table-bordered">			
			<th style="width:200px">Kode Das</th>
			<th style="width:350px">Kode Sungai</th>
			<th style="width:350px">Nama Sungai</th>			
			<th style="width:350px">Aksi</th>				
			@foreach($cari as $temp)
				<tr>					
					<td>{{ $temp->sungaikodedas }}</td>
					<td>{{ $temp->sungaikodesng }}</td>
					<td>{{ $temp->sungainamasng }}</td>
					<td><small>
						{{ link_to_route('ubah', 'Ubah', array($temp->id), array('class' => 'btn btn-small btn-info')) }}
						{{ link_to_route('hapus', 'Hapus', array($temp->id), array('class' => 'btn btn-small btn-info')) }}									
					</small></td>	
				</tr>
			@endforeach
		</table>
		<!-- <p style="padding-left:30px">
			{{ Form::submit('Hapus Ceklis', array('class' => 'tombol')) }} 
			<small>*Ceklis data terlebih dahulu.</small>
		</p>
		 -->

	{{-- Bila Sungai tidak ada --}}
	@else
		<h3 id="tengah">
			Maaf, kata yang Anda maksud tidak ditemukan. <br/><br/>
			<a href="{{ route('beranda') }}" class="btn btn-small btn-info">Kembali</a>
		</h3>
		<br/>
		@if(count($daftar))
		<p id="tengah">Atau mungkin yang Anda maksud adalah ini :</p>
		<table class="table table-striped table-bordered">			
			<th style="width:200px">Kode Das</th>
			<th style="width:350px">Kode Sungai</th>
			<th style="width:350px">Nama Sungai</th>			
			@foreach($daftar as $temp)
				<tr>					
					<td>{{ $temp->sungaikodedas }}</td>
					<td>{{ $temp->sungaikodesng }}</td>
					<td>{{ $temp->sungainamasng }}</td>					
				</tr>
			@endforeach
		</table>
		@endif
	@endif
@stop