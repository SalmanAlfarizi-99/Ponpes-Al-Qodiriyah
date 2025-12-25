<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->tinyInteger('day'); // 1=Monday, 2=Tuesday, etc.
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room')->nullable();
            $table->string('academic_year')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            // Prevent schedule conflicts
            $table->unique(['class_id', 'day', 'start_time', 'academic_year'], 'unique_class_schedule');
            $table->unique(['teacher_id', 'day', 'start_time', 'academic_year'], 'unique_teacher_schedule');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
