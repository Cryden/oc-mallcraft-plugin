<?php

namespace Crydesign\Mallcraft\Models;

use Model;

use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\SortableRelation;
use October\Rain\Database\Traits\Validation;

/**
 * PropertyGroup Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class PropertyGroup extends Model
{
    use Validation;
    use Sluggable;
    use SortableRelation;
    use Sortable;

    public $table = 'mallcraft_property_groups';

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'display_name',
        'description',
    ];

    public $slugs = [
        'slug' => 'name',
    ];

    public $rules = [
        'name' => 'required',
    ];

    public $fillable = [
        'name',
        'display_name',
        'slug',
        'description'
    ];

    public $belongsToMany = [
        'properties'            => [
            Property::class,
            'table'      => 'mallcraft_property_property_group',
            'key'        => 'property_group_id',
            'otherKey'   => 'property_id',
            'pivot'      => ['use_for_offers', 'filter_type', 'sort_order'],
            'pivotSortable' => 'sort_order',
        ],
        // 'filterable_properties' => [
        //     Property::class,
        //     'table'      => 'offline_mall_property_property_group',
        //     'key'        => 'property_group_id',
        //     'otherKey'   => 'property_id',
        //     'pivot'      => ['use_for_variants', 'filter_type', 'sort_order'],
        //     'pivotModel' => PropertyGroupProperty::class,
        //     'order'      => 'offline_mall_property_property_group.sort_order ASC',
        //     'conditions' => 'offline_mall_property_property_group.filter_type is not null',
        // ],
        'categories'            => [
            Category::class,
            'table'    => 'mallcraft_category_property_group',
            'key'      => 'property_group_id',
            'otherKey' => 'category_id',
            'pivotSortable' => 'sort_order',
        ],
    ];
}
