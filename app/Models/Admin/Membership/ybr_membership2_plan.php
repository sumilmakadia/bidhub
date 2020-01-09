<?php

namespace App\Models\Admin\Membership;

use App\Models\Admin\Membership\ybr_membership1_product;
use Illuminate\Database\Eloquent\Model;

class ybr_membership2_plan extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ybr_membership2_plans';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'product_id',
                  'plan_name',
                  'plan_description',
                  'extradesc',
                  'plan_amount',
                  'plan_object',
                  'plan_billing_scheme',
                  'plan_currency',
                  'plan_interval',
                  'plan_interval_count',
                  'plan_livemode',
                  'trial_period_days'
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
     * Get the YbrMembership1Product for this model.
     *
     * @return App\Models\YbrMembership1Product
     */
    public function YbrMembership1Product()
    {
        return $this->belongsTo("App\Models\Admin\Membership\ybr_membership1_product", "product_id", 'id');
    }

    /**
     * Get the ybrMembership6Permission for this model.
     *
     * @return App\Models\YbrMembership6Permission
     */
    public function ybrMembership6Permission()
    {
        return $this->hasOne('App\Models\YbrMembership6Permission','plan_id','id');
    }

    /**
     * Get the ybrMembership7Feature for this model.
     *
     * @return App\Models\YbrMembership7Feature
     */
    public function feature()
    {
        return $this->hasMany('App\Models\Admin\Membership\ybr_membership7_feature','plan_id','id');
    }


}
