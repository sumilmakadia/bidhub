<?php

namespace App;

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
							  'name', 'email', 'password', 'role_id', 'help', 'property', 'free_trial', 'days_left','notification_status'
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
							  return $this->hasMany('App\Models\Crest\project','id', 'created_by');
					}
					
					public function profile()
					{
							  return $this->hasOne('App\Models\Crest\profile','user_id', 'id');
					}
					
					public function sendPasswordResetNotification($token)
                    {
                        $this->notify(new App\Notifications\ResetPassword($token));
                    }
}
