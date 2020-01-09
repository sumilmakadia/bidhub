<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class resumes extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resumes';

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
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','created_by');
    }

    /**
     * Get the project for this model.
     *
     * @return App\Models\Project
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Crest\Project','project_id');
    }
    
    public function resume_files()
    {
        return $this->hasMany('App\Models\Crest\fileResumes','resume_id','id');
    }
    
    public function help()
    {
        return $this->belongsTo('App\Models\Crest\help','help_id');
    }
    
    public function profile()
	{
		return $this->belongsTo('App\Models\Crest\profile','created_by', 'user_id');
	}
	
	public function notification()
	{
	    return $this->hasOne('App\Models\Crest\resume_notifications','resume_id','id');
	}
	
	public function chatroom()
	{
	    return $this->hasOne('App\Models\Crest\chatroom','owner_id',Auth::user()->id);
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
