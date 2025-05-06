<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daily_rotation_history', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->json('rotation_data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_rotation_history');
    }
};
