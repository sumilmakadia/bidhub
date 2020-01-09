<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table = 'events';
    protected $fillable = [
    	'title',
    	'description',
    	'image',
    	'date',
    	'link',
    	'created_by'
	];

	public function user() {
		return $this->belongsTo('App\Models\User', 'created_by', 'id');
	}
}
