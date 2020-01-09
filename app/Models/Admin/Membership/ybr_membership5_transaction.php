<?php

namespace App\Models\Admin\Membership;

use Illuminate\Database\Eloquent\Model;

class ybr_membership5_transaction extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ybr_membership5_transactions';

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
                  'plan_id',
                  'membership_start',
                  'membership_end',
                  'membership_charge_date',
                  'membership_charge',
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
     * Get the creator for this model.
     *
     * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }
    
     public function profile()
    {
        return $this->belongsTo('App\Models\Crest\profile', 'created_by', 'user_id');
    }
 
    public function plan()
    {
	return $this->belongsTo('App\Models\Crest\ybr_membership2_plan','plan_id', 'id');
    }

      public function addon()
      {
    			return $this->belongsTo('App\Models\Crest\ybr_membership5_addon','plan_id', 'id');
      }
    /**
     * Set the membership_start.
     *
     * @param  string  $value
     * @return void
     */
    // public function setMembershipStartAttribute($value)
    // {
    //     $this->attributes['membership_start'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    // /**
    //  * Set the membership_end.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // public function setMembershipEndAttribute($value)
    // {
    //     $this->attributes['membership_end'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    // /**
    //  * Set the membership_charge_date.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // public function setMembershipChargeDateAttribute($value)
    // {
    //     $this->attributes['membership_charge_date'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // }

    // /**
    //  * Set the created_by.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // // public function setCreatedByAttribute($value)
    // // {
    // //     $this->attributes['created_by'] = !empty($value) ? \DateTime::createFromFormat('[% date_format %]', $value) : null;
    // // }

    // /**
    //  * Get membership_start in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getMembershipStartAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

    // /**
    //  * Get membership_end in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getMembershipEndAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

    // /**
    //  * Get membership_charge_date in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getMembershipChargeDateAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    // }

    // /**
    //  * Get created_by in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // // public function getCreatedByAttribute($value)
    // // {
    // //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // // }

    // /**
    //  * Get created_at in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getCreatedAtAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

    // /**
    //  * Get updated_at in array format
    //  *
    //  * @param  string  $value
    //  * @return array
    //  */
    // public function getUpdatedAtAttribute($value)
    // {
    //     return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    // }

}
