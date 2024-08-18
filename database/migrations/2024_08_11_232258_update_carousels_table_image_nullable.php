<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCarouselsTableImageNullable extends Migration
{
    public function up()
    {
        Schema::table('carousels', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('carousels', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
        });
    }
}
