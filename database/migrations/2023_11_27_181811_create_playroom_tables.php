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
        Schema::create('playroom', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('product_group');
            $table->integer('t0');
            $table->integer('t1');
            $table->integer('t2');
            $table->integer('t3');
            $table->integer('t4');
            $table->integer('t5');
            $table->integer('t6');
            $table->integer('t7');
            $table->integer('t8');
            $table->integer('t9');
            $table->integer('qty');
            $table->integer('points');
            $table->string('date');
            $table->string('time');
            $table->timestamps();
        });
    }

    /**`user_id`, `product_group`, `t0`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `t7`, `t8`, `t9`, `qty`, `points`, `date`, `time`
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playroom_tables');
    }
};
