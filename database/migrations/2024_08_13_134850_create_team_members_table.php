<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('image'); // URL or path to the image
            $table->text('social_links')->nullable(); // JSON data for social media links
            $table->timestamps();
        });
        
    }
    
    public function down()
    {
        Schema::dropIfExists('team_members');
    }
    
};
