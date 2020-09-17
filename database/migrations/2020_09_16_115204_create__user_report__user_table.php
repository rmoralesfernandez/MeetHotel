<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReportUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_report__user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_report_id')->unsigned()->nullable();
            $table->foreign('user_report_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_reported_id');
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
        Schema::dropIfExists('_user_report__user');
    }
}
