<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class ybr_membership3_member extends Model
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
    protected $table = 'ybr_membership3_members';

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
                  'status',
                  'object',
                  'customer_id',
                  'product_id',
                  'plan_id',
                  'plan_amount',
                  'plan_interval',
                  'plan_interval_count',
                  'trial_period_days',
                  'created',
                  'canceled_at',
                  'current_period_start',
                  'current_period_end'
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
     * Set the created.
     *
     * @param  string  $value
     * @return void
     */
    public function setCreatedAttribute($value)
    {
        $this->attributes['created'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Set the canceled_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setCanceledAtAttribute($value)
    {
        $this->attributes['canceled_at'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Set the current_period_start.
     *
     * @param  string  $value
     * @return void
     */
    public function setCurrentPeriodStartAttribute($value)
    {
        $this->attributes['current_period_start'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Set the current_period_end.
     *
     * @param  string  $value
     * @return void
     */
    public function setCurrentPeriodEndAttribute($value)
    {
        $this->attributes['current_period_end'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    }

    /**
     * Get created in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get canceled_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCanceledAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get current_period_start in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCurrentPeriodStartAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get current_period_end in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCurrentPeriodEndAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
