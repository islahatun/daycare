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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name',30);
            $table->string('student_image',255);
            $table->date('birth_date');
            $table->integer('age');
            $table->string('birth_city',30);
            $table->string('mother_name',30)->nullable();
            $table->string('father_name',30)->nullable();
            $table->text('address');
            $table->string('mother_job',30);
            $table->string('father_job',30);
            $table->string('email')->unique();
            $table->string('telp',13)->unique();
            $table->integer('validate')->default(0);
            $table->enum('registration_status',[0,1])->nullable();
            $table->enum('payment_status',[0,1])->nullable();
            $table->string('payment_image',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
