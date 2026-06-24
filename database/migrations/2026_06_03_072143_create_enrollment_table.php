<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentTable extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('enroll_no')->unique();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('batch_id');
            $table->date('join_date');
            $table->decimal('fee', 10, 2);
            $table->timestamps();
            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade');

            $table->foreign('batch_id')
                  ->references('id')
                  ->on('batches')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}