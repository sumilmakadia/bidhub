<?php

namespace App\Models\Crest;

use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipments';

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
                  'equipment_title',
                  'equipment_description',
                  'equipment_image',
                  'equipment_acres',
                  'equipment_cost',
                  'category',
                  'equipment_annual_taxes',
                  'parcel_tax_number',
				  'location',
				  'latitude',
				  'longitude',
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
							  return $this->belongsTo('App\Models\Crest\profile','created_by', 'user_id');
					}
}
