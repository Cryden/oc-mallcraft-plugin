<?php

namespace Crydesign\Mallcraft\Models;

use Model;

use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Validation;
use October\Rain\Database\Traits\NestedTree;

/**
 * Category Model
 *
 * @property int $id
 * @property bool $active
 * @property string $name
 * @property string $slug
 * @property string $code
 * @property string $external_id
 * @property string $preview_text
 * @property string $description
 * @property int $parent_id
 * @property int $nest_left
 * @property int $nest_right
 * @property int $nest_depth
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @package crydesign\mallcraft
 */

class Category extends Model
{
    use Sluggable;
    use Validation;
    use NestedTree;

    public $table = 'crydesign_mallcraft_categories';

    public $implement = [
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

    public $fillable = [
        'active',
        'name',
        'slug',
        'parent_id',
        'external_id',
        'preview_text',
        'description',
    ];

    public $translatable = [
        'name',
        ['slug', 'index' => true],
        'preview_text',
        'description'
    ];

    public $rules = [
        'name' => 'required',
        'slug' => 'required|unique:crydesign_mallcraft_categories',
    ];

    public $slugs = ['slug' => 'name'];

    public $belongsToMany = [
        'products'          => [
            Product::class,
            'table'    => 'crydesign_mallcraft_category_product',
            'key'      => 'category_id',
            'otherKey' => 'product_id',
            'pivot'    => ['sort_order'],
            'pivotSortable' => 'sort_order',
        ],
        'property_groups'   => [
            PropertyGroup::class,
            'table'    => 'crydesign_mallcraft_category_property_group',
            'key'      => 'category_id',
            'otherKey' => 'property_group_id',
            'pivotSortable' => 'sort_order'
        ],
    ];
}
