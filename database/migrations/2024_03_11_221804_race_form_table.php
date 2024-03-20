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
        Schema::create('race_form', function (Blueprint $table) {
            $table->id();
            $table->json('distance')->nullable(false);
            $table->string('number_starts_from')->nullable();
            $table->json('payments')->nullable();
            $table->string('notes')->nullable();
            $table->unsignedBigInteger('race_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('race_id')->references('id')->on('race')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('race_type')->onDelete('cascade');
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
        Schema::dropIfExists('race_form');
    }
};
