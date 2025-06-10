<?php namespace Crydesign\Mallcraft\Models;

use Model;

/**
 * Offer Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Offer extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'crydesign_mallcraft_offers';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
