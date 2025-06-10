<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCategoriesTable Migration
 *
 * Creates categories table for Mallcraft plugin
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - active: Boolean flag for category status
 * - name: Category name
 * - slug: Unique URL-friendly identifier
 * - code: Optional category code
 * - external_id: Optional external system identifier
 * - preview_text: Optional short description
 * - description: Optional full description
 * - parent_id: Optional parent category reference
 * - nest_left: Left boundary for nested set
 * - nest_right: Right boundary for nested set
 * - nest_depth: Depth level in category tree
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Categories table name
     */
    const TABLE_NAME = 'mallcraft_categories';

    /**
     * Creates the categories table
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
            $table->string('code')->nullable();
            $table->string('external_id')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('nest_left')->nullable()->unsigned();
            $table->integer('nest_right')->nullable()->unsigned();
            $table->integer('nest_depth')->nullable()->unsigned();
            $table->timestamps();

            $table->index('name');
            $table->index('code');
            $table->index('external_id');
        });
    }

    /**
     * Drops the categories table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
