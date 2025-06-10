<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use October\Rain\Database\Schema\Blueprint;

/**
 * CreateCategoryProductTable Migration
 *
 * Creates a pivot table for the many-to-many relationship between categories and products
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Category-Product pivot table name
     */
    const TABLE_NAME = 'mallcraft_category_product';

    /**
     * Creates the category-product pivot table
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
            $table->integer('product_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('sort_order')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('mallcraft_products')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('mallcraft_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Drops the category-product pivot table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
