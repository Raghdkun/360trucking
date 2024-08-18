<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfpDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('afp_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Foreign key to customers
            $table->string('owner_name');
            $table->text('office_full_address');
            $table->text('yard_full_address');
            $table->integer('number_of_trucks');
            $table->integer('number_of_drivers');
            $table->string('amazon_scorecard_rating');
            $table->enum('dispatch_handling_method', ['in house', 'dispatch service']);
            $table->text('main_services');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('afp_details');
    }
}
