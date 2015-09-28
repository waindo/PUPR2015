<?php
class Sungai extends Eloquent{
	#Tentukan Nama Tabel
 	protected $table='sungai';
 	# Kolom yang boleh di isi pada tabel sungai
	protected $fillable = array('sungaikodedas', 'sungaikodesng', 'sungainamasng');
}