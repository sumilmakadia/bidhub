<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class resume_notifications extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resume_notifications';

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
    
    public function profile()
    {
        return $this->hasOne('App\Models\Crest\profile','user_id','user_id');
    }
    
    public function resume()
    {
        return $this->belongsTo('App\Models\Crest\resumes','resume_id');
    }

}
