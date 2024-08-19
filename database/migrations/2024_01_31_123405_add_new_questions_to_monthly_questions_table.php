<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewQuestionsToMonthlyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_questions', function (Blueprint $table) {
            $table->longText('biggest_win')->after('job_improvement')->nullable();
            $table->longText('nextmonth_goal')->after('biggest_win')->nullable();
            $table->longText('goal_blocker')->after('nextmonth_goal')->nullable();
            $table->longText('month_education')->after('goal_blocker')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_questions', function (Blueprint $table) {
            $table->dropColumn('biggest_win');
            $table->dropColumn('nextmonth_goal');
            $table->dropColumn('goal_blocker');
            $table->dropColumn('month_education');
        });
    }
}
