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
        Schema::create('trans_development_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('development_childerns_id');
            $table->double('score',2,2);
            $table->string('assessment_from')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_development_children');
    }
};
