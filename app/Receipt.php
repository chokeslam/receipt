<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
	protected	$table      = 'receipts';
	
	protected	$primaryKey = 'id';
	
	protected	$fillable   = 

	[
		'Name',
		'User',
		'Numbers',
		'transactor',
		'Status',
		'Start_time',
		'PayBack_time',
		'End_time'
	];
}
