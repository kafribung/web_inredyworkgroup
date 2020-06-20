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
            $table->id();
            $table->string('nir')->unique()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('img')->default('default_user.png');
            $table->string('hp')->unique()->nullable();
            $table->string('job')->nullable();
            $table->date('date_birth')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('role')->unsigned()->default(0);
            $table->tinyInteger('status')->unsigned()->default(0);

            $table->string('token')->unique();

            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->bigInteger('concentration_id')->unsigned()->nullable();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('concentration_id')->references('id')->on('concentrations')->onDelete('cascade');

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
