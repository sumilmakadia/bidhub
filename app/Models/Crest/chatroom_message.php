<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class chatroom_message extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chatroom_messages';


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
     * Get the Chatroom for this model.
     *
     * @return App\Models\Chatroom
     */
    public function chatroom()
    {
        return $this->belongsTo('App\Models\Crest\chatroom','chatroom_id');
    }

    /**
     * Get the creator for this model.
     *
     * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }

    /**
     * Get the chatroomMessagesFile for this model.
     *
     * @return App\Models\ChatroomMessagesFile
     */
    public function file()
    {
        return $this->hasOne('App\Models\Crest\chatroom_messages_file','message_id','id');
    }
    
    public function user()
    {
        return $this->hasOne('App\Models\User','id','created_by');
    }
    
    public function profile()
    {
        return $this->hasOne('App\Models\Crest\profile','user_id','created_by');
    }
    
    public function recipient()
    {
        return $this->hasOne('App\Models\User','id','sent_to');
    }
    
    public function files()
    {
        return $this->hasMany('App\Models\Crest\chatroom_messages_file','message_id','id');
    }

    /**
     * Set the updated_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedDateAttribute($value)
    {
        $this->attributes['updated_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */

    /**
     * Get updated_date in array format
     *
     * @param  string  $value
     * @return array
     */

}
