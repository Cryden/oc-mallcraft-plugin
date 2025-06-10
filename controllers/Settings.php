<?php

namespace Crydesign\Mallcraft\Controllers;

use BackendMenu;
use System\Controllers\Settings as Controller;

use System\Classes\SettingsManager;

class Settings extends Controller
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Crydesign.Mallcraft', 'mallcraft', 'settings');
    }

    public function index()
    {
        $this->pageTitle = 'backend::lang.mysettings.menu_label';
        $this->vars['items'] = SettingsManager::instance()->listItems('mall_settings');
        $this->bodyClass = 'compact-container';
        $this->addCss('/plugins/crydesign/mallcraft/assets/css/pages/settings.css', 'global');
    }
}
