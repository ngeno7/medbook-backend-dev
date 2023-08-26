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
        Schema::create('tbl_patient', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->timestamps();

            $table->foreign('gender_id')->references('id')
                ->on('tbl_gender')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_patient');
    }
};
