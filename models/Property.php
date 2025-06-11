<?php

namespace Crydesign\Mallcraft\Models;

use Model;

use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\SoftDelete;
use October\Rain\Database\Traits\SortableRelation;
use October\Rain\Database\Traits\Validation;

/**
 * Property Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Property extends Model
{
    use Validation;
    use SoftDelete;
    use Sluggable;
    use SortableRelation;

    /**
     * @var string table name
     */
    public $table = 'mallcraft_properties';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required'
    ];

    public $slugs = [
        'slug' => 'name',
    ];

    public $jsonable = ['options'];

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'unit',
        'options',
    ];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'type',
        'unit',
        'slug',
        'options',
    ];

    public $hasMany = [
        'property_values' => PropertyValue::class,
    ];

    public $belongsToMany = [
        'property_groups' => [
            PropertyGroup::class,
            'table'      => 'mallcraft_property_property_group',
            'key'        => 'property_id',
            'otherKey'   => 'property_group_id',
        ],
    ];

    public function getTypeOptions()
    {
        $options = [
            'text'       => __('Text'),
            'integer'    => __('Integer'),
            'float'      => __('Float'),
            'textarea'   => __('Textarea'),
            'richeditor' => __('Rich Editor'),
            'dropdown'   => __('Dropdown'),
            'checkbox'   => __('Checkbox'),
            'color'      => __('Color'),
            'image'      => __('Image'),
            'datetime'   => __('Datetime'),
            'date'       => __('Date'),
            'switch'     => __('Switch'),
        ];

        return $options;
    }

    public function getFilterOptions()
    {
        $options = [
            'set'   => __('Set'),
            'range' => __('Range')
        ];

        return $options;
    }
}
