<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCategoryPropertyGroupTable Migration
 *
 * Creates a pivot table for the many-to-many relationship between categories and property groups
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Category-PropertyGroup pivot table name
     */
    const TABLE_NAME = 'mallcraft_category_property_group';

    /**
     * Creates the category-property group pivot table
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable(self::TABLE_NAME)) {
            return;
        }

        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('property_group_id')->unsigned();
            $table->integer('sort_order')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('crydesign_mallcraft_categories')
                ->onDelete('cascade');

            $table->foreign('property_group_id')
                ->references('id')
                ->on('crydesign_mallcraft_property_groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Drops the category-property group pivot table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
