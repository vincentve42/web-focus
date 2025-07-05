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
        Schema::create('pengeluarans', function(Blueprint $table)
        {
            $table->id();
            $table->text('image');
            $table->text('keterangan_1');
            $table->text('keterangan_2');
            $table->bigInteger('debit')->default(0);
            $table->bigInteger('kredit')->default(0);
            $table->bigInteger('harga')->default(0);
            $table->timestamp("created_at");
            $table->timestamp("updated_at");
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
