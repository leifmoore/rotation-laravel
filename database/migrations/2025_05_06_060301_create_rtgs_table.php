<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rtgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name_code');
            $table->json('status')->default('[]');
            $table->integer('tour_count')->default(0);
            $table->string('location')->nullable();
            $table->integer('position')->default(0);
            $table->string('availability_status')->default('Available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rtgs');
    }
};
