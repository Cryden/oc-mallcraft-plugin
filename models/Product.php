<?php namespace Crydesign\Mallcraft\Models;

use Model;

/**
 * Product Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'crydesign_mallcraft_products';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
