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
        
        Schema::create('kas', function(Blueprint $table)
        {
            $table->id();
            $table->bigInteger('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->integer('bulan');
            $table->bigInteger('total')->default(0);
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
