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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->default(1);
            $table->foreignId('evaluation_id');
            $table->foreignId('user_id');
            $table->string('bank_statement')->nullable();
            $table->string('iban')->nullable();
            $table->string('debt_slip')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'evaluation_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
