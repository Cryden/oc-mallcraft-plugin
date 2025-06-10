<?php namespace Crydesign\Mallcraft\Models;

use Model;

/**
 * PropertyGroup Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class PropertyGroup extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'crydesign_mallcraft_property_groups';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
