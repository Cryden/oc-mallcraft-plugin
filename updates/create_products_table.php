<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateProductsTable Migration
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
        Schema::create('crydesign_mallcraft_products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('active')->default(0);
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('external_id')->nullable();
            $table->string('code')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('name');
            $table->index('code');
            $table->index('external_id');
            $table->index('category_id');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('crydesign_mallcraft_products');
    }
};
