<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePropertyValuesTable Migration
 *
 * Creates a table to store property values for products and variants
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - product_id: Reference to the product
 * - variant_id: Optional reference to the product variant
 * - property_id: Reference to the property
 * - value: The actual property value
 * - index_value: Indexed version of the value for searching
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Property values table name
     */
    const TABLE_NAME = 'mallcraft_property_values';

    /**
     * Creates the property values table
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
            $table->integer('variant_id')->unsigned()->nullable();
            $table->integer('property_id');
            $table->text('value')->nullable();
            $table->text('index_value')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Drops the property values table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
