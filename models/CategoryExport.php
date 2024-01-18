<?php

namespace Crydesign\Mallcraft\Models;

use \Backend\Models\ExportModel;

class CategoryExport extends ExportModel
{
    private $export = [];

    public function exportData($columns, $sessionKey = null)
    {
        $categories = Category::all();

        $export = array();

        $categories->each(function ($category, $key) use ($columns) {
            $category->addVisible($columns);
            $this->export[$key] = $category->toArray();
        });

        return $this->export;
    }
}
