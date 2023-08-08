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
        Schema::create('bearer_tokens', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('integration_type_id');
            $table->text('token');
            $table->string('expiry', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bearer_tokens');
    }
};
