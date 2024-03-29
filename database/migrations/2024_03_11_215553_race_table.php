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
        Schema::create('race', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('logo')->nullable(false);
            $table->string('front_description')->nullable();
            $table->string('race_description')->nullable();
            $table->boolean('is_active')->nullable(false)->default(false);
            $table->string('document')->nullable();
            $table->smallInteger('position')->nullable(false);
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
        Schema::dropIfExists('race');
    }
};
