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
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('department_id');
            $table->string('department_name',100)->unique();
            $table->string('department_remarks',250)->nullable();
            $table->integer('department_creator')->nullable();
            $table->integer('department_editor')->nullable();
            $table->string('department_slug',30)->nullable();
            $table->integer('department_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
