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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->char('order_code', 16);
            $table->string('nama_pemesan', 60);
            $table->string('no_hp_pemesan', 13);
            $table->string('email_pemesan', 100);
            $table->string('lokasi', 255);
            $table->string('catatan', 255)->nullable();
            $table->unsignedBigInteger('id_catalogue');
            $table->foreign('id_catalogue')->references('id')->on('catalogues');
            $table->enum('order_status', ['requested', 'accepted', 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
