<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->datetime('birthday')->nullable();
            $table->string('career')->nullable();
            $table->string('location')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('salary')->nullable();
            $table->string('commitment')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('visa_status')->nullable();
            $table->string('hide')->nullable();
            $table->string('cv')->nullable();
            $table->string('academic')->nullable();
            $table->text('summary_cv')->nullable();
            $table->boolean('isAdmin')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
