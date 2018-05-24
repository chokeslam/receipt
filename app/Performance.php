<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
	protected	$table      = 'performances';
	
	protected	$primaryKey = 'id';
	
	protected	$fillable   = ['Name','Amount','Class','Status','Place','Date'];
}
