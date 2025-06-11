<?php namespace Crydesign\Mallcraft\Models;

use Model;

/**
 * PropertyValue Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class PropertyValue extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'crydesign_mallcraft_property_values';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
