<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'featured',
        'recommend'
    ];

    public function category() {

        return $this->belongsTo('CodeCommerce\Category');
    }

}