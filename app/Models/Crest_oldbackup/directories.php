<?php

		  namespace App\Models\Crest;

		  use Illuminate\Database\Eloquent\Model;
		  use Laravel\Scout\Searchable;

		  class directories extends Model
		  {

					use Searchable;
					public $asYouType = true;
					/**
					 * The database table used by the model.
					 *
					 * @var string
					 */
					protected $table = 'directories';

					/**
					 * The database primary key value.
					 *
					 * @var string
					 */
					protected $primaryKey = 'id';
					protected $keyType = 'string';
					public $incrementing = false;


					/**
					 * Attributes that should be mass-assignable.
					 *
					 * @var array
					 */
					protected $guarded = ['id'];

					public function toSearchableArray()
					{
							  $array = $this->toArray();

							  return $array;
					}
					/**
					 * The attributes that should be mutated to dates.
					 *
					 * @var array
					 */
					protected $dates = [];

					/**
					 * The attributes that should be cast to native types.
					 *
					 * @var array
					 */
					protected $casts = [];


					/**
					 * Get the creator for this model.
					 *
					 * @return App\User
					 */
					public function creator()
					{
							  return $this->belongsTo('App\User','created_by');
					}
					
					public function profile()
					{
							  return $this->belongsTo('App\Models\Crest\profile','user_id', 'user_id');
					}
		  }
