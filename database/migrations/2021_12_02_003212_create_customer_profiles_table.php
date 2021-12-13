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
            $table->id();
            $table->string('phone_number')->require()->unique();
            $table->char('gender')->require();
            $table->String('nationality')->require();
            $table->string('city')->require();
            $table->string('address')->require();
            $table->string('job')->require();
            $table->double('height')->require();
            $table->double('weight')->require();
            $table->string('social_status')->require();
            $table->integer('children_number')->require();
            $table->integer('wife_count')->default(0);
            $table->string('educational_Status')->require();
            $table->string('civil_id_no')->require();
            $table->string('civil_id_no_exp')->require();
            $table->date('birthdate')->require();
            $table->string('fire_base_token')->require();
            $table->json('more');
            // $table->string('skin_colour');
            // $table->string('physique');
            // $table->string('religiosity');
            // $table->string('prayer');
            // $table->string('smoking');
            // $table->string('beard');
            // $table->string('financial_status');
            // $table->string('health_status');
            // $table->text('required_specifications');
            // $table->string('about');
            // $table->string('mirage_type');
            // $table->string('income');
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
