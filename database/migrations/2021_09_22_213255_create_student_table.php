<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number', 100)->unique();
            $table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('parent_name', 100);
			$table->string('email', 100);
            $table->string('classlevel', 100);
			$table->string('phone_number', 100);
			$table->string('image')->nullable();
			$table->string('gender', 50);
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
        Schema::dropIfExists('student');
    }
}
