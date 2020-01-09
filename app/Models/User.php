<?php

		  namespace App\Models;

		  use Illuminate\Notifications\Notifiable;
		  use Illuminate\Contracts\Auth\MustVerifyEmail;
		  use Illuminate\Foundation\Auth\User as Authenticatable;

		  class User extends \TCG\Voyager\Models\User {
					use Notifiable;

					/**
					 * The attributes that are mass assignable.
					 * @var array
					 */
					protected $fillable = [
							  'name', 'email', 'password', 'role_id', 'property', 'help', 'free_trial'
					];

					/**
					 * The attributes that should be hidden for arrays.
					 * @var array
					 */
					protected $hidden = [
							  'password', 'remember_token',
					];

					/**
					 * The attributes that should be cast to native types.
					 * @var array
					 */
					protected $casts = [
							  'email_verified_at' => 'datetime',
					];

					public function project()
					{
							  return $this->hasMany('App\Models\Crest\project','created_by', 'id');
					}

					public function profile()
					{
							  return $this->hasOne('App\Models\Crest\profile','user_id', 'id');
					}

					public function proposal()
					{
							  return $this->hasMany('App\Models\Crest\proposal','created_by', 'id');
					}

					public function event()
					{
							return $this->hasMany('App\Models\Crest\event', 'created_by', 'id');
					}
					
					  public function plan()
		            {
					return $this->belongsTo('App\Models\Crest\ybr_membership2_plan','role_id', 'id');
		            }
		  
            		  public function addon()
            		  {
            					return $this->belongsTo('App\Models\Crest\ybr_membership5_addon','property', 'id');
            		  }
		  }
