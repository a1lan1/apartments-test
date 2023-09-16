<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('price', 18, 4)->unsigned();
            $table->tinyInteger('bedrooms')->unsigned()->default(0);
            $table->tinyInteger('bathrooms')->unsigned()->default(0);
            $table->tinyInteger('storeys')->unsigned()->default(0);
            $table->tinyInteger('garages')->unsigned()->default(0);
            $table->text('description')->nullable();

            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
