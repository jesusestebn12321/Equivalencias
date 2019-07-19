<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('matter_id')->unique();
            $table->foreign('matter_id')->references('id')
            ->on('matters');

            $table->unsignedInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')
            ->on('users');

            $table->boolean('type')->default(0);

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
        Schema::dropIfExists('matter_users');
    }
}
