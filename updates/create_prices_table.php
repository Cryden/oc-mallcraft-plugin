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
    const TABLE_NAME = 'mallcraft_prices';
    /**
     * up builds the migration
     */
    public function up()
    {
        if (Schema::hasTable(self::TABLE_NAME)) {
            return;
        }

        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->integer('priceable_id')->unsigned();
            $table->string('priceable_type');
            $table->integer('price')->nullable();
            $table->integer('old_price')->nullable();
            $table->integer('price_category_id')->unsigned()->nullable();
            $table->string('field')->nullable();
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
