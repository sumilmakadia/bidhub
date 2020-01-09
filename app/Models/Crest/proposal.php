<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class proposal extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proposals';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = true;
	public $timestamps = true;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'bid_title',
                  'bid_description',
                  'bid_status',
                  'bid_files_json',
                  'project_id',
                  'trade',
                  'created_by',
                  'project_owner'
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
    
    public function profile()
	{
		return $this->belongsTo('App\Models\Crest\profile','created_by', 'user_id');
	}
	
	public function notification()
	{
	    return $this->hasOne('App\Models\Crest\proposal_notifications','proposal_id','id');
	}

	public function project()
	{
		return $this->belongsTo('App\Models\Crest\project','project_id', 'id');
	}
	
	public function chatroom()
	{
		return $this->belongsTo('App\Models\Crest\chatroom','id', 'proposal_id');
	}

}
