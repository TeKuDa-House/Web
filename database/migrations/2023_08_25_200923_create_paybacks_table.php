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
        Schema::create('paybacks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trans_id')->constrained('transactions');

            $table->string('reason');
            $table->enum('state', ['en cours', 'remboursé', 'annulé']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paybacks');
    }
};
