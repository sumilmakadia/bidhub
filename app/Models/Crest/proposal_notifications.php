<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class proposal_notifications extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proposal_notifications';


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
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function profile()
    {
        return $this->hasOne('App\Models\Crest\profile','user_id','user_id');
    }

    /**
     * Get the proposal for this alert.
     *
     * @return App\Models\proposal
     */
    public function proposal()
    {
        return $this->belongsTo('App\Models\Crest\proposal','proposal_id');
    }
}
