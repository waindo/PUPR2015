<?php
class Codes extends Eloquent{
	// tabel yang digunakan
 	protected $table='codesx';
 	// MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)
 	protected $fillable = array('codesxheadxxx', 'codesxcodexxx','codesxdesc1xx','codesxdesc2xx','codesxstatusx');
}