<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentOffenseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_offense_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('offense_id');
            $table->string('file_name');
            $table->timestamps();
            $table->foreign('offense_id')->references('id')->on('student_offenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_offense_files');
    }
}
