<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSocialLinksInTeamMembersTable extends Migration
{
    public function up()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('social_links'); // Drop the existing social_links column
            $table->string('facebook_link')->nullable(); // Facebook link
            $table->string('twitter_link')->nullable(); // X link
            $table->string('instagram_link')->nullable(); // Instagram link
        });
    }

    public function down()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['facebook_link', 'twitter_link', 'instagram_link']); // Drop the new columns
            $table->text('social_links')->nullable(); // Restore the old social_links column
        });
    }
}
