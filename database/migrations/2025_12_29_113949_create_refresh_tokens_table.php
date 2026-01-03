<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('refresh_tokens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->char('token', 64)->unique();

            $table->string('device')->nullable();

            $table->timestamp('expires_at');
            $table->timestamp('revoked_at')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->index('user_id');
            $table->index(['expires_at', 'revoked_at']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('refresh_tokens');
    }
};
