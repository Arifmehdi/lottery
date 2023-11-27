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
        Schema::create('yantra', function (Blueprint $table) {
            $table->id();
            $table->string('NV');
            $table->string('RR');
            $table->string('RY');
            $table->string('CH');
            $table->string('date')->nullable;
            $table->string('time')->nullable;
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.`NV`, `RR`, `RY`, `CH`, `date`, `time`, `status`
     */
    public function down(): void
    {
        Schema::dropIfExists('yantras');
    }
};
