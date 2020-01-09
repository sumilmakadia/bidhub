<?php

namespace App\Models\Admin\App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
    protected $fillable = [
                  'role_id',
                  'name',
                  'email',
                  'avatar',
                  'email_verified_at',
                  'password',
                  'remember_token',
                  'settings'
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
     * Get the Role for this model.
     *
     * @return App\Models\Role
     */
    public function Role()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');
    }

    /**
     * Get the userRole for this model.
     *
     * @return App\Models\UserRole
     */
    public function userRole()
    {
        return $this->hasOne('App\Models\UserRole','user_id','id');
    }

    /**
     * Set the email_verified_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }




}
