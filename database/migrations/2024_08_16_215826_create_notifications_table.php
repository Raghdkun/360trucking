<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('title');
            $table->text('message');
            $table->json('data')->nullable(); // Optional if you need to store extra data in JSON format
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->string('url')->nullable(); // URL to navigate when the notification is clicked
            $table->string('notifiable_type')->default('User'); // To store the type of the notifiable entity (e.g., User)
            $table->bigInteger('notifiable_id'); // To store the ID of the notifiable entity
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
