<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone_number')->require();
            $table->string('fullName')->require();
            $table->char('gender')->require();
            $table->String('nationality')->require();
            $table->string('city')->require();
            $table->string('country')->require();
            $table->string('religion')->require();
            $table->string('physique')->require();
            $table->string('skinColour')->require();
            $table->string('prayer')->require();
            $table->string('religiosity')->require();
            $table->string('beard')->require();
            $table->string('smoking')->require();
            $table->string('financialStatus')->require();
            $table->string('employment')->require();
            $table->string('income')->require();
            $table->string('healthStatus')->require();
            $table->text('specifications')->require();
            $table->text('aboutYou')->require();
            $table->string('job')->require();
            $table->double('height')->require();
            $table->double('weight')->require();
            $table->string('social_status')->require();
            $table->integer('children_number')->require();
            $table->string('civil_id_no')->require();
            $table->date('birthdate')->require();
            $table->json('fire_base_token')->require();
            $table->string('image_url')->require();
            $table->string('educational')->require();
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_profiles');
    }
}
