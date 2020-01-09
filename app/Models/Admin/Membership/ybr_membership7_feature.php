<?php

namespace App\Models\Admin\Membership;

use Illuminate\Database\Eloquent\Model;

class ybr_membership7_feature extends Model
{
    protected $table= 'ybr_membership7_features';
    protected $fillable = [
    	'plan_id',
    	'feature_name'
	];

	public function plan() {
			  return $this->belongsTo('App\Models\Admin\Membership\ybr_membership2_plan', 'plan_id', 'id');
	}
}
