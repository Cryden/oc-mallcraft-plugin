<?php

namespace Crydesign\Mallcraft\Models;

use Model;

/**
 * Property Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Property extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'mallcraft_properties';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public function getTypeOptions()
    {
        return [
            'text'       => trans('offline.mall::lang.custom_field_options.text'),
            'integer'    => trans('offline.mall::lang.custom_field_options.integer'),
            'float'      => trans('offline.mall::lang.custom_field_options.float'),
            'textarea'   => trans('offline.mall::lang.custom_field_options.textarea'),
            'richeditor' => trans('offline.mall::lang.custom_field_options.richeditor'),
            'dropdown'   => trans('offline.mall::lang.custom_field_options.dropdown'),
            'checkbox'   => trans('offline.mall::lang.custom_field_options.checkbox'),
            'color'      => trans('offline.mall::lang.custom_field_options.color'),
            'image'      => trans('offline.mall::lang.custom_field_options.image'),
            'datetime'   => trans('offline.mall::lang.custom_field_options.datetime'),
            'date'       => trans('offline.mall::lang.custom_field_options.date'),
            'switch'     => trans('offline.mall::lang.custom_field_options.switch'),
        ];
    }
}
