<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePropertyGroupsTable Migration
 *
 * Creates property groups table for Mallcraft plugin
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - name: Group name
 * - display_name: Optional display name for frontend
 * - description: Optional group description
 * - slug: Unique URL-friendly identifier
 * - sort_order: Optional ordering position
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Property groups table name
     */
    const TABLE_NAME = 'mallcraft_property_groups';

    /**
     * Creates the property groups table
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
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort_order')->nullable();
            $table->timestamps();

            $table->index('name');
            $table->index('slug');
        });
    }

    /**
     * Drops the property groups table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
