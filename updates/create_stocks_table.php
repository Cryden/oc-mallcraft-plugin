<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateStocksTable Migration
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
        Schema::create('crydesign_mallcraft_stocks', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('item_type');
            $table->integer('quantity')->nullable();
            $table->timestamps();

            $table->index('item_id');
            $table->index('item_type');
            $table->index('quantity');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('crydesign_mallcraft_stocks');
    }
};
