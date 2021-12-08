<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name_prefix', 10);
            $table->string('first_name', 255);
            $table->char('middle_initial', 1)->nullable();
            $table->string('last_name', 255);
            $table->char('gender', 1);
            $table->string('e_mail', 255);
            $table->string('fathers_name', 255);
            $table->string('mothers_name', 255);
            $table->string('mothers_maiden_name', 50)->nullable();
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->decimal('salary', 8, 2);
            $table->string('ssn', 255);
            $table->string('phone_no', 255);
            $table->string('city', 255);
            $table->char('state', 2);
            $table->integer('zip');
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
        Schema::dropIfExists('employees');
    }
}
