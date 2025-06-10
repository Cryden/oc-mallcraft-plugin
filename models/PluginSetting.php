<?php

namespace Crydesign\Mallcraft\Models;

class PluginSetting extends \System\Models\SettingModel
{
    use \October\Rain\Database\Traits\Multisite;

    public $settingsCode = 'mallcraft_settings';

    public $settingsFields = 'fields.yaml';

    protected $propagatable = [];
}
