<?php

namespace Crydesign\Mallcraft\Models;

use Model;

/**
 * Price Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Price extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'crydesign_mallcraft_prices';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $morphTo = [
        'item' => [],
    ];

    public $belongsTo = [
        'currency' => [Currency::class],
    ];
}
