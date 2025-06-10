<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePropertyPropertyGroupTable Migration
 *
 * Creates a pivot table for the many-to-many relationship between properties and property groups
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - property_id: Reference to the property
 * - property_group_id: Reference to the property group
 * - use_for_offers: Boolean flag indicating if property is used for offers
 * - filter_type: Optional filter type for the property
 * - sort_order: Optional ordering position
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Property-PropertyGroup pivot table name
     */
    const TABLE_NAME = 'mallcraft_property_property_group';

    /**
     * Creates the property-property group pivot table
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
            $table->integer('property_id')->unsigned();
            $table->integer('property_group_id')->unsigned();
            $table->boolean('use_for_offers')->default(false);
            $table->string('filter_type')->nullable();
            $table->integer('sort_order')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Drops the property-property group pivot table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
