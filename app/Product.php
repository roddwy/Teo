<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $table = "products";

	protected $dates = ['deleted_at'];


	protected $fillable = ['cod','name','description','image','punctuation','price_business_bol','price_customers_bol','price_business_sol','price_customers_sol','price_business_dollar','price_customers_dollar','phase_id','user_id'];

	public function phase()
	{
		return $this->belongsTo('App\Phase');
	}

	public function user()
	{
		return $this->belongsTo('App\Product');
	}

}
