<?php

use App\Models\Comment;
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

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user_likes', function (Blueprint $table) {
            $table->id();
            $table->morphs('likeable');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('like');
            $table->timestamps();
        });

        Schema::create('user_emojis', function (Blueprint $table) {
            $table->id();
            $table->morphs('emojiable');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('emoji');
            $table->timestamps();
        });

        Comment::create([
            'content' => 'Comment',
            'user_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('user_likes');
        Schema::dropIfExists('user_emojis');
    }
};
