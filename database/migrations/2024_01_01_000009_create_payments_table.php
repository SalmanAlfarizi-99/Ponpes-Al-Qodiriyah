<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        // Payment Types/Categories
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // SPP, Pendaftaran, Infaq, Seragam, etc.
            $table->string('code')->unique();
            $table->decimal('amount', 12, 2)->default(0); // Default amount
            $table->text('description')->nullable();
            $table->enum('frequency', ['monthly', 'yearly', 'once', 'optional'])->default('monthly');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // Payment Records
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santri')->onDelete('cascade');
            $table->foreignId('payment_type_id')->constrained('payment_types')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->tinyInteger('month')->nullable(); // 1-12 for monthly payments
            $table->year('year');
            $table->date('payment_date');
            $table->string('receipt_number')->unique()->nullable();
            $table->enum('payment_method', ['cash', 'transfer', 'other'])->default('cash');
            $table->text('notes')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['santri_id', 'payment_type_id', 'month', 'year']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('payment_types');
    }
}
