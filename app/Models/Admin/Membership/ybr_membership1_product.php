<?php

namespace App\Models\Admin\Membership;

use App\Models\Admin\Membership\ybr_membership2_plan;
use Illuminate\Database\Eloquent\Model;

class ybr_membership1_product extends Model
{
		  /**
		   * The database table used by the model.
		   *
		   * @var string
		   */
		  protected $table = 'ybr_membership1_products';

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
					'product_title',
					'product_description',
					'product_status',
					'product_object',
					'product_images',
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
		  public function YbrMembership2Plan()
		  {
					return $this->hasOne("App\Models\Admin\Membership\ybr_membership2_plan", 'product_id', 'id');
		  }

}
