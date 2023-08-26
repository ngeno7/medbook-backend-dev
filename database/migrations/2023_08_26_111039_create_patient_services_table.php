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
        Schema::create('tbl_patient_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            // delete the record in case patient is deleted
            $table->foreign('patient_id')->references('id')->on('tbl_patient')
                ->onDelete('cascade');
                // to avoid delete of record in case service is deleted
                $table->foreign('service_id')->references('id')->on('tbl_service')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_patient_services');
    }
};
