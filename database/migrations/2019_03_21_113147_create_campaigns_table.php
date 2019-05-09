<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('objectives');
            $table->integer('nbQuestions');
            $table->integer('questionsTotalAmount');
            $table->string('desiredSexe');
            $table->integer('desiredAgeMin');
            $table->integer('desiredAgeMax');
            $table->date('startDate');
            $table->date('finishDate');
            $table->integer('nbOfDays');
            $table->integer('activeCampaign');
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
        Schema::dropIfExists('campaigns');
    }
}
