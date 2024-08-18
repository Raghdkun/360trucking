<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generals_settings', function (Blueprint $table) {
            $table->string('address')->nullable()->after('phone');
            $table->string('email')->nullable()->after('address');
            $table->string('facebook_link')->nullable()->after('email');
            $table->string('youtube_link')->nullable()->after('facebook_link');
            $table->string('instagram_link')->nullable()->after('youtube_link');
            $table->string('linkedin_link')->nullable()->after('instagram_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn(['address', 'email', 'facebook_link', 'youtube_link', 'instagram_link', 'linkedin_link']);
        });
    }
}
