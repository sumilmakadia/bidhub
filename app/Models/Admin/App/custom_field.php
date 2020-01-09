<?php

namespace App\Models\Admin\App;

use Illuminate\Database\Eloquent\Model;

class custom_field extends Model
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
    protected $table = 'custom_fields';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'custom_field',
                  'value',
                  'created_on',
                  'updated_on'
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
     * Set the created_on.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedOnAttribute($value)
    {
        $this->attributes['created_on'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Set the updated_on.
     *
     * @param  string  $value
     * @return void
     */
    public function setUpdatedOnAttribute($value)
    {
        $this->attributes['updated_on'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get created_on in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedOnAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_on in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedOnAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
