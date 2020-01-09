<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

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

		  public function user()
		  {
					return $this->belongsTo('App\User','user_id', 'id');
		  }
		  
		  public function roles()
		  {
					return $this->belongsTo('App\Models\Role','role', 'name');
		  }
		  
		  public function directory()
		  {
				return $this->belongsTo('App\Models\Crest\directories','user_id', 'user_id');
		  }
		  
		  public function directory_upload()
		  {
		      return $this->hasOne('App\Models\Crest\DirectoryUploads','user_id','user_id');
		  }
		  
		  public function claim()
		  {
		      return $this->hasOne('App\Models\Crest\Claim','user_id','user_id');
		  }
		  
		  public function approved()
		  {
		      return $this->hasOne('App\Models\Crest\Claim','user_id','user_id')->where('approved',1);
		  }

}
