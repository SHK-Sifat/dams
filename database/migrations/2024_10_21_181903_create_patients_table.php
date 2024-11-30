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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('patient_id');
            $table->integer('user_id')->nullable();
            $table->string('patient_name',100)->nullable();
            $table->string('patient_phone',100)->nullable();
            $table->string('patient_email',100)->nullable();
            $table->string('patient_address',100)->nullable();
            $table->string('patient_remarks',250)->nullable();
            $table->string('patient_image',50)->nullable();
            $table->integer('patient_creator')->nullable();
            $table->integer('patient_editor')->nullable();
            $table->string('patient_slug',30)->nullable();
            $table->integer('patient_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
