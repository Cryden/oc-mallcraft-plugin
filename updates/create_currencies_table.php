<?php

namespace Crydesign\Mallcraft\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateCurrenciesTable Migration
 *
 * Creates currencies table for Mallcraft plugin
 *
 * Fields:
 * - id: Auto-incrementing primary key
 * - active: Boolean flag for currency status
 * - is_default: Boolean flag for default currency
 * - name: Currency name (e.g. "US Dollar")
 * - code: Unique currency code (e.g. "USD")
 * - symbol: Currency symbol (e.g. "$")
 * - rate: Exchange rate relative to default currency
 * - external_id: Optional external system identifier
 * - sort_order: Optional sorting position
 * - deleted_at: Soft delete timestamp
 * - created_at: Creation timestamp
 * - updated_at: Last update timestamp
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * Currencies table name
     */
    const TABLE_NAME = 'mallcraft_currencies';

    /**
     * Creates the currencies table
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
            $table->boolean('is_default')->default(0);
            $table->string('name');
            $table->string('code')->unique();
            $table->string('symbol');
            $table->decimal('rate')->default(1);
            $table->string('external_id')->nullable();
            $table->integer('sort_order')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('external_id');
        });
    }

    /**
     * Drops the currencies table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
