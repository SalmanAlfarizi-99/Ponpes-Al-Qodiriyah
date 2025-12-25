<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('content_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('section'); // hero, about, contact, footer, etc.
            $table->text('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, image, json
            $table->string('label')->nullable(); // Display label for admin
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('content_settings');
    }
}
