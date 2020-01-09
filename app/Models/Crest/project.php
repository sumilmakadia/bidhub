<?php

		  namespace App\Models\Crest;

		  use Illuminate\Database\Eloquent\Model;
		  use Laravel\Scout\Searchable;

		  class project extends Model
		  {
					use Searchable;
					/**
					 * Indicates if the model should be timestamped.
					 *
					 * @var bool
					 */
					public $timestamps = true;


					/**
					 * The database table used by the model.
					 *
					 * @var string
					 */
					protected $table = 'projects';

					/**
					 * The database primary key value.
					 *
					 * @var string
					 */
					protected $primaryKey = 'id';
					protected $keyType = 'bigint';
					public $incrementing = true;


					/**
					 * Attributes that should be mass-assignable.
					 *
					 * @var array
					 */
					protected $fillable = [
							  'title',
							  'description',
							  'image',
							  'status',
							  'starts_on',
							  'need_bid_by_date',
							  'how_many_units',
							  'job_type',
							  'location',
							  'trade',
							  'latitude',
							  'longitude',
							  'city',
							  'state',
							  'postal_code',
							  'phone',
							  'email',
							  'preferred_contact',
							  'created_by',
					];

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
					public function user()
					{
							  return $this->belongsTo('App\User','created_by', 'id');
					}
					
					/**
					 * Get the profile for this model.
					 *
					 * @return App\Models\Crest\profile
					 */
					public function profile()
					{
							  return $this->belongsTo('App\Models\Crest\profile','created_by', 'user_id');
					}

					/**
					 * Get the budget for this model.
					 *
					 * @return App\Models\Budget
					 */
					public function budget()
					{
							  return $this->hasOne('App\Models\Crest\budget','id','project_id');
					}

					/**
					 * Get the file for this model.
					 *
					 * @return App\Models\File
					 */
					public function file()
					{
							  return $this->hasOne('App\Models\File','project_id','id');
					}

					/**
					 * Get the proposals for this model.
					 *
					 * @return Illuminate\Database\Eloquent\Collection
					 */
					public function proposals()
					{
							  return $this->hasMany('App\Models\Crest\proposal','project_id','id');
					}
					
					/**
					 * Get the favorite for this model.
					 *
					 * @return Illuminate\Database\Eloquent\Collection
					 */
					public function favorite()
					{
							  return $this->hasMany('App\Models\Crest\favorite','favorite_id','id')->where('favorite_type', '=', 'favorite_projects');
					}

					public function chatroom() {
						return $this->hasMany('App\Models\Crest\chatroom', 'project_id', 'id');
					}


		  }
