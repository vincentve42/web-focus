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
        Schema::create('notifs', function(Blueprint $table)
        {
            $table->id();
            $table->bigInteger('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->text('judul');
            $table->text('isi');
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
