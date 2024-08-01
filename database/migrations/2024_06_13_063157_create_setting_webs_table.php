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
        Schema::create('setting_webs', function (Blueprint $table) {
            $table->id();
            $table->string('contact', 60);
            $table->string('email', 60);
            $table->string('instagram', 60);
            $table->string('maps', 1500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_webs');
    }
};
