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
        Schema::create('doctors', function (Blueprint $table) {
          $table->bigIncrements('doctor_id');
          $table->integer('user_id')->nullable();
          $table->string('doctor_name',100)->nullable();
          $table->string('doctor_phone',100)->nullable();
          $table->string('doctor_email',100)->nullable();
          $table->integer('department_id')->nullable();
          $table->string('doctor_specialist',100)->nullable();
          $table->string('doctor_degree',100)->nullable();
          $table->string('doctor_remarks',250)->nullable();
          $table->string('doctor_image',50)->nullable();
          $table->integer('doctor_creator')->nullable();
          $table->integer('doctor_editor')->nullable();
          $table->string('doctor_slug',30)->nullable();
          $table->integer('doctor_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
