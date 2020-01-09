<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class fileResumes extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files_resumes';

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
        return $this->belongsTo('App\Models\Project','project_id');
    }
    
    public function resume()
    {
        return $this->belongsTo('App\Models\Resumes','resume_id');
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
