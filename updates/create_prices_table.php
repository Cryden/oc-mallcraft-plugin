<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreatePricesTable Migration
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
        Schema::create('crydesign_mallcraft_prices', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('item_type');
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('old_price', 15, 2)->nullable();
            $table->integer('price_type_id')->unsigned()->nullable();
            $table->timestamps();

            $table->index('item_id');
            $table->index('item_type');
            $table->index('price');
            $table->index('old_price');
            $table->index('price_type_id');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('crydesign_mallcraft_prices');
    }
};
