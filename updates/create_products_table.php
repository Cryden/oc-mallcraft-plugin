<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateProductsTable Migration
 *
 * Creates products table for Mallcraft plugin
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - active: Boolean flag for product status
 * - name: Product name
 * - slug: Unique URL-friendly identifier
 * - category_id: Optional parent category reference
 * - external_id: Optional external system identifier
 * - inventory_management_method: Method for managing product inventory (default: 'single')
 * - group_by_property_id: Optional property ID for grouping products
 * - preview_text: Optional short description
 * - description: Optional full description
 * - deleted_at: Soft delete timestamp
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Products table name
     */
    const TABLE_NAME = 'mallcraft_products';

    /**
     * Creates the products table
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable(self::TABLE_NAME)) {
            return;
        }

        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('active')->default(0);
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('external_id')->nullable();
            $table->string('inventory_management_method')->default('single');
            $table->integer('group_by_property_id')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Drops the products table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
