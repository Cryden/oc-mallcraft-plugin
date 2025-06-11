<?php

namespace Crydesign\Mallcraft\Models;

use Model;

use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Validation;

/**
 * Product Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Product extends Model
{
    use Sluggable;
    use Validation;

    public $table = 'mallcraft_products';

    public $implement = [
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

    public $translatable = [
        'name',
        ['slug', 'index' => true],
        'preview_text',
        'description'
    ];

    public $rules = [
        'name' => 'required',
        'slug' => 'required|unique:mallcraft_products',
    ];

    public $slugs = ['slug' => 'name'];

    public $hasOne = [
        'category' => [Category::class],
    ];

    public $belongsToMany = [
        'additional_category' => [
            Category::class,
            'table'      => 'mallcraft_category_product',
            'key'        => 'product_id',
            'otherKey'   => 'category_id',
        ],
    ];

    public $hasMany = [
        'offers' => [Offer::class],
    ];

    public function getProductTypeOptions()
    {
        return [
            'single'  => __('single'),
            'offers' => __('offers'),
        ];
    }
}
