<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCategoriesTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('crydesign_mallcraft_categories', function (Blueprint $table) {
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
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('crydesign_mallcraft_categories');
    }
};
