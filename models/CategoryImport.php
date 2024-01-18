<?php

namespace Crydesign\Mallcraft\Models;

use Exception;
use \Backend\Models\ImportModel;

class CategoryImport extends ImportModel
{
    /**
     * @var array rules to be applied to the data.
     */
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {

            try {
                $data['parent_id'] = null;
                $data['active'] = true;
                $category = Category::firstOrNew(['external_id' => $data['external_id']], $data);
                $category->slugAttributes();
                $category->save();
                $this->logCreated();
            } catch (Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }

        foreach ($results as $row => $data) {
            try {
                $parent = Category::where('external_id', $data['parent_id'])->first();

                $category = Category::where('external_id', $data['external_id'])->first();

                if (isset($parent)) {
                    $category->makeChildOf($parent);
                }
            } catch (Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }
    }
}
