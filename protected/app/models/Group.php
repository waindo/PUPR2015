<?php
class Group extends Eloquent{
	// tabel yang digunakan
 	protected $table='groupx';
 	// MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)
 	protected $fillable = array('groupxgroupid', 'groupxgroupxx');
}