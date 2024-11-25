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
        Schema::create('list_logs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('addon_id')->constrained('addon_master_data')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->date('date');
            $table->string('status');
            $table->foreignId('bp_code')->constrained('business_partners')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_logs');
    }
};
