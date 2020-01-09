<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class chatroom extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chatrooms';

    /**
    * The database primary key value.
    *
    * @var string
    */


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
     * Get the Proposal for this model.
     *
     * @return App\Models\Proposal
     */
    public function Proposal()
    {
        return $this->belongsTo('App\Models\Proposal','proposal_id','id');
    }

    public function project() {
    	return $this->belongsTo('App\Models\Crest\project', 'project_id', 'id');
    }

    /**
     * Get the chatroomMessage for this model.
     *
     * @return App\Models\ChatroomMessage
     */
    public function chatroomMessage()
    {
        return $this->hasOne('App\Models\Crest\ChatroomMessage','chatroom_id','id');
    }
    
    public function chatroomMessages()
    {
        return $this->hasMany('App\Models\Crest\ChatroomMessage','chatroom_id','id');
    }
    
    public function lastMessage()
    {
        return $this->hasOne('App\Models\Crest\chatroom_message','chatroom_id','id')->orderBy('created_at','desc');
    }

    public function owner()
    {
        return $this->hasOne('App\User','id','owner_id');
    }
    
    public function guest()
    {
        return $this->hasOne('App\User','id','guest_id');
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
