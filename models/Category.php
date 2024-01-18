<?php

namespace Crydesign\Mallcraft\Models;

use Model;

use October\Rain\Database\Traits\Sluggable;
use October\Rain\Database\Traits\Validation;
use October\Rain\Database\Traits\NestedTree;

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
}
