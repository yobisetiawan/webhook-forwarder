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
        Schema::create('webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('host')->nullable();
            $table->string('full_url')->nullable();
            $table->json('body');
            $table->json('header');
            $table->json('logs');
            $table->timestamps();
        });

        Schema::create('webhook_configs', function (Blueprint $table) {
            $table->id();
            $table->string('from_domain_url');
            $table->string('to_domain_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhooks');
        Schema::dropIfExists('webhook_configs');
    }
};
