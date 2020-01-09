<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
                  'name',
                  'display_name'
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
     * Get the permissionRoles for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function permissionRoles()
    {
        return $this->hasMany('App\Models\PermissionRole','role_id','id');
    }

    /**
     * Get the userRole for this model.
     *
     * @return App\Models\UserRole
     */
    public function userRole()
    {
        return $this->hasOne('App\Models\UserRole','role_id','id');
    }

    /**
     * Get the users for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function users()
    {
        return $this->hasMany('App\Models\User','role_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
