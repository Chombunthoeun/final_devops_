<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enrollment_id');
            $table->string('payment_no');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('method')->default('cash');
            $table->text('remarks');
            $table->timestamps();
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}