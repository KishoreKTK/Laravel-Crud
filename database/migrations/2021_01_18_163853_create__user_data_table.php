<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserData', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->unique();
            $table->string('uname', 100);
            $table->string('password',255);
            $table->enum('gender',['M', 'F']);
            $table->date('bday');
            $table->string('job_type',100);
            $table->integer('experiane');
            $table->text('languages');
            $table->string('img_path');
            $table->string('describe',255);
            $table->enum('t&c',['0','1'])->default('0');
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
        Schema::dropIfExists('UserData');
    }
}
