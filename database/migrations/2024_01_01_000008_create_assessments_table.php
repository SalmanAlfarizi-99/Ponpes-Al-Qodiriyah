<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santri')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null');
            $table->enum('type', ['daily', 'midterm', 'final', 'practical', 'tahfidz']);
            $table->decimal('score', 5, 2);
            $table->decimal('max_score', 5, 2)->default(100);
            $table->tinyInteger('semester'); // 1 or 2
            $table->string('academic_year'); // e.g., 2024/2025
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index(['santri_id', 'subject_id', 'semester', 'academic_year']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
