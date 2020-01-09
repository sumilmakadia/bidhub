<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class chatroom_messages_file extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chatroom_messages_files';

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
                  'message_id',
                  'file_name',
                  'file_path',
                  'file_type',
                  'created_by'
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
     * Get the ChatroomMessage for this model.
     *
     * @return App\Models\ChatroomMessage
     */
    public function message()
    {
        return $this->belongsTo('App\Models\Crest\chatroom_message','message_id','id');
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
}
