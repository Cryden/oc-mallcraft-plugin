<?php

namespace Crydesign\Mallcraft\Controllers;

use BackendMenu;
use System\Controllers\Settings as Controller;

class Settings extends Controller
{
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Crydesign.Mallcraft', 'mallcraft', 'settings');
    }
}
