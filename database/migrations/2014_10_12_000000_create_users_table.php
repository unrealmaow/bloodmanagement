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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['donor', 'receiver', 'admin'])->default('receiver');
            $table->enum('verification', ['verified', 'not_verified'])->default('not_verified');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->unsignedBigInteger('bloodgroup_id')->nullable();
            $table->foreign('bloodgroup_id')->references('id')->on('bloodgroups');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
