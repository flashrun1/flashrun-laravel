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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(\App\Models\Promocode::STATUS_DISABLED);
            $table->string('code')->unique();
            $table->tinyInteger('type'); // limited/unlimited/etc.
            $table->integer('actuations')->nullable();
            $table->integer('actuations_used')->nullable();
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->tinyInteger('discount_type'); // % or UAH
            $table->integer('discount_value'); // discount amount example 10 depends on discount_type
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
        Schema::dropIfExists('promocodes');
    }
};
