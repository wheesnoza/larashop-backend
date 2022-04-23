<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->snowflake()->primary();
            $table->string('code', 6);
            $table->string('title');
            $table->string('description')->nullable();
            $table->tinyInteger('type');
            $table->json('content');
            $table->dateTime('holding_period_start');
            $table->dateTime('holding_period_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
