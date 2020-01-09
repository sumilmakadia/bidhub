<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class fileType extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'file_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
