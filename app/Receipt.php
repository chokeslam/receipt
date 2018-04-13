<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
	protected	$table      = 'receipts';
	
	protected	$primaryKey = 'id';
	
	protected	$fillable   = ['Name','User','Numbers','Status','End_time'];
}
