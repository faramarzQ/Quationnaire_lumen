<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
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
            $table->enum('type', ['admin', 'questioner']);
            $table->enum('status', ['active', 'inactive']);
            $table->string('name', 30);  //30
            $table->string('mobile', 11);  //11
            $table->string('password', 256); //50
            $table->string('api_token', 512); //256
            $table->timestamp('deleted_at');    
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
