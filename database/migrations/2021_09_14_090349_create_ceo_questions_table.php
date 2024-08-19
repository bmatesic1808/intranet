<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeoQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceo_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('understanding');
            $table->integer('right_time_info');
            $table->integer('company_info_sharing');
            $table->integer('decisions');
            $table->integer('communication');
            $table->integer('focus');
            $table->integer('time_management');
            $table->integer('reviews');
            $table->integer('employee_autonomy');
            $table->integer('career');
            $table->integer('employe_ideas');
            $table->integer('knowledge');
            $table->integer('care');
            $table->longText('recommendation');
            $table->longText('improvement');
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
        Schema::dropIfExists('ceo_questions');
    }
}
