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
        Schema::create('chats', function(Blueprint $blueprint)
        {
            $blueprint->id();
            $blueprint->bigInteger('user_id')->references('id')->on('users')->onDelete('cascade');
            $blueprint->string('isi')->default(null);
            $blueprint->string('date')->default(null);
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
