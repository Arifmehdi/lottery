<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deposit', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('amount');
            $table->string('payment_id');
            $table->string('payment_method',100);
            $table->string('date');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     * .user_id`, `amount`, `payment_id`, `payment_method`, `date`, `status
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit');
    }
};
