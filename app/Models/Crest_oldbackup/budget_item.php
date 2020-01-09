<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class budget_item extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'budget_items';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'bigint';
    public $incrementing = true;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'title',
                  'amount',
                  'budget_id',
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
     * Get the Budget for this model.
     *
     * @return App\Models\Budget
     */
    public function Budget()
    {
        return $this->belongsTo('App\Models\Budget','budget_id','id');
    }

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
