<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'properties';

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
                  'user_id',
                  'property_title',
                  'property_description',
                  'property_contact',
                  'property_email',
                  'property_phone',
                  'property_image',
                  'property_acres',
                  'property_cost',
                  'property_files_json',
                  'property_annual_taxes',
                  'parcel_tax_number',
                  'property_country',
                  'property_state',
                  'property_city',
                  'property_zip',
                  'property_address1',
                  'property_address2',
                  'property_lat',
                  'property_long'
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
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
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
    
    /**
	* Get the profile for this model.
	*
	* @return App\Models\Crest\profile
	*/
	public function profile()
	{
		return $this->belongsTo('App\Models\Crest\profile','created_by', 'user_id');
	}

}
