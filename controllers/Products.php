<?php

namespace Crydesign\Mallcraft\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Products extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $formConfig = 'config_form.yaml';

    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['crydesign.mallcraft.products'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Crydesign.Mallcraft', 'mallcraft', 'products');
    }

    public function listInjectRowClass($record, $definition = null)
    {
        if (!$record->active) {
            return 'safe';
        }
    }
}
