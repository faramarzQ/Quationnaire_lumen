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
            $table->enum('type', ['admin', 'questioner'])->nullable(false);
            $table->enum('status', ['active', 'inactive']);
            $table->string('name', 30)->nullable(false);  //30
            $table->string('mobile', 11)->nullable(false);  //11
            $table->string('password', 50)->nullable(false); //50
            $table->string('api_token', 256); //256
            $table->dateTime('deleted_at');
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
