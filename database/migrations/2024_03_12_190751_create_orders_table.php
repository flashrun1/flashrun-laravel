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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->tinyInteger('status')->default(0);
            $table->string('currency');
            $table->integer('amount');
            $table->string('transaction_id');
            $table->text('notes')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('distance');
            $table->string('city');
            $table->string('club')->nullable();
            $table->string('promocode')->nullable();
            $table->integer('number')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
