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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('icon'); // SVG or FontAwesome class
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
        
    }
    
    public function down()
    {
        Schema::dropIfExists('features');
    }
    
};
