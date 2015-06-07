<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('car_id');
            $table->integer('car_brand_id');
            $table->integer('car_prototype_id');
            $table->integer('car_color_id');
            $table->integer('agreement_status_id');
            $table->string('sheet_car');
            $table->timestamp('registration_date');
            $table->timestamp('delivery_date');
            $table->decimal('cash');
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
        Schema::drop('agreements');
    }

}
