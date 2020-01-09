<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claims';

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
    
    public function directory()
    {
        return $this->belongsTo('App\Models\Crest\DirectoryUploads','directory_id');
    }
    
    public function profile()
    {
        return $this->belongsTo('App\Models\Crest\Profile','user_id','user_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
