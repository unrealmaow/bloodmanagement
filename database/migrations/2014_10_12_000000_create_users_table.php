<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'verification' => 'verified',
            'phone' => '03089052052',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'role' => 'donor',
            'name' => 'Donor',
            'email' => 'donor@gmail.com',
            'verification' => 'not_verified',
            'phone' => '03089052051',
            'password' => Hash::make('12345678'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
