<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');



            $table->integer('pointAmount');

            $table->date('startDate');
            $table->date('finishDate');

            $table->boolean('active');

            $table->string('answer1');
            $table->integer('nbAnswer1')->default('0');

            $table->string('answer2');
            $table->integer('nbAnswer2')->default('0');

            $table->string('answer3')->nullable();;
            $table->integer('nbAnswer3')->default('0');

            $table->string('answer4')->nullable();;
            $table->integer('nbAnswer4')->default('0');

            $table->integer('nbShown')->default('0');
            $table->integer('nbAnswers')->default('0');


            $table->integer('category_id');
            $table->integer('campaign_id');
            $table->integer('user_id');

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
        Schema::dropIfExists('questions');
    }
}