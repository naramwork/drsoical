<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('job')->nullable();
            $table->text('specifications')->nullable();
            $table->double('income')->nullable();
            $table->text('about')->nullable();
            $table->string('city')->nullable();
            $table->string('social_status')->nullable();
            $table->string('mirage_type')->nullable();
            $table->integer('children_number')->nullable();
            $table->char('gender')->nullable();
            $table->double('height')->nullable();
            $table->string('residence')->nullable();
            $table->string('nationality')->nullable();
            $table->string('health_status')->nullable();
            $table->string('financial_status')->nullable();
            $table->string('certificate')->nullable();
            $table->string('qualification')->nullable();
            $table->string('beard')->nullable();
            $table->string('smoking')->nullable();
            $table->string('location')->nullable();
            $table->string('skin_colour')->nullable();
            $table->string('physique')->nullable();
            $table->string('religiosity')->nullable();
            $table->text('prayer')->nullable();
            $table->double('weight')->nullable();


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
        Schema::dropIfExists('user_profiles');
    }
}
