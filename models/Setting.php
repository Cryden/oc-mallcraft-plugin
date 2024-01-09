<?php

namespace Crydesign\Mallcraft\Models;

class Setting extends \System\Models\SettingModel
{
    use \October\Rain\Database\Traits\Multisite;

    public $settingsCode = 'crydesign_mallcraft_settings';

    public $settingsFields = 'fields.yaml';

    protected $propagatable = [];
}
