<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePropertiesTable Migration
 *
 * Creates properties table for Mallcraft plugin
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - name: Property name
 * - slug: Unique URL-friendly identifier
 * - type: Property type (e.g. "string", "number", "boolean")
 * - unit: Optional measurement unit
 * - options: Optional JSON-encoded property options
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 * - deleted_at: Soft delete timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Properties table name
     */
    const TABLE_NAME = 'mallcraft_properties';

    /**
     * Creates the properties table
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
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('type');
            $table->string('unit')->nullable();
            $table->text('options')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('type');
        });
    }

    /**
     * Drops the properties table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
