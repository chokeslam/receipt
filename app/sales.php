<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
	protected	$table      = 'sales';

	protected	$primaryKey = 'id';
	
	protected	$fillable   = ['Name'];
}
