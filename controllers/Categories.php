<?php

namespace Crydesign\Mallcraft\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Response;

/**
 * Categories Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Categories extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\ImportExportController::class
    ];

    public $formConfig = 'config_form.yaml';

    public $listConfig = 'config_list.yaml';

    public $importExportConfig = 'config_import_export.yaml';

    public $requiredPermissions = ['crydesign.mallcraft.categories'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Crydesign.Mallcraft', 'mallcraft', 'categories');
    }

    public function listInjectRowClass($record, $definition = null)
    {
        if (!$record->active) {
            return 'safe';
        }
    }

    public function onExportJSON()
    {
        $exportColumns = [
            'id',
            'name',
            'slug',
            'parent_id',
            'preview_text',
            'description',
        ];

        $exportModel = new \Crydesign\Mallcraft\Models\CategoryExport();

        $exportModel->file_format = 'json';

        return $exportModel->exportDownload('categories.json', ['columns' => $exportColumns]);
    }

    public function onExportCSV()
    {
        $exportColumns = [
            'id',
            'name',
            'slug',
            'parent_id',
            'preview_text',
            'description',
        ];

        $exportModel = new \Crydesign\Mallcraft\Models\CategoryExport();

        $exportModel->file_format = 'csv';

        return $exportModel->exportDownload('categories.csv', ['columns' => $exportColumns]);
    }
}
