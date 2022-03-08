<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->userID();
            $table->integer('groupid')->default(0);
            $table->integer('groupNumber')->default(0);
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName');
            $table->integer('userlevel')->default(0);
            $table->string('email')->unique();
            $table->string('password');
          //  $table->timestamp('created_at')->nullable();
           // $table->timestamp('updated_at')->nullable();

            //$table->rememberToken();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
