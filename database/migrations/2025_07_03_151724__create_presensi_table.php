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
        Schema::create('presensis', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->integer('accepted')->default(0);
            $table->text('image');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
