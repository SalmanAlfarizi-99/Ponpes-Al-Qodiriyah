<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level')->nullable(); // e.g., Ibtidaiyah, Tsanawiyah, Aliyah
            $table->string('academic_year'); // e.g., 2024/2025
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null'); // Homeroom teacher
            $table->integer('capacity')->default(30);
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
