<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::query()->insert([
            [
                'id' => 1,
                'name' => 'TestUser1',
                'email' => 'TestUser1@example.com',
                'email_verified_at' => now(),
                'password' => 'p1'
            ], [
                'id' => 2,
                'name' => 'TestUser2',
                'email' => 'TestUser2@example.com',
                'email_verified_at' => now(),
                'password' => 'p2'
            ], [
                'id' => 3,
                'name' => 'TestUser3',
                'email' => 'TestUser3@example.com',
                'email_verified_at' => now(),
                'password' => 'p3'
            ], [
                'id' => 4,
                'name' => 'TestUser4',
                'email' => 'TestUser4@example.com',
                'email_verified_at' => now(),
                'password' => 'p4'
            ],[
                'id' => 5,
                'name' => 'TestUser5',
                'email' => 'TestUser5@example.com',
                'email_verified_at' => now(),
                'password' => 'p5'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
