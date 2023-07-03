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
        Schema::create('polyclinics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('work_time');
            $table->bigInteger('population');
            $table->string('phone');
            $table->string('target');
            $table->text('departments')->nullable()->default(null);
            $table->integer('district_id');
            $table->decimal('latitude', 10, 7); // Precision: 10, Scale: 7
            $table->decimal('longitude', 10, 7); // Precision: 10, Scale: 7
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polyclinics');
    }
};
