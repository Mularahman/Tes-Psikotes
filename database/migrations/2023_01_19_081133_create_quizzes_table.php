<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('quiz');
            $table->string('deskripsi');
            $table->string('jenisquiz');
            $table->string('info');
            $table->string('info2');
            $table->string('info3');
            $table->string('token');
            $table->string('slug');
            $table->date('date');
            $table->time('time');
            $table->tinyInteger('status')->nullable()->default('1');
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
        Schema::dropIfExists('quizzes');
    }
}
