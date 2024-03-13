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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('image_teacher',255);
            $table->date('birth_date');
            $table->string('birth_city',30);
            $table->text('address');
            $table->string('graduate_of',50);
            $table->string('major',50);
            $table->string('university',30);
            $table->year('graduation_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
