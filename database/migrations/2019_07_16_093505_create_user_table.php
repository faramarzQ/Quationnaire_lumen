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
            $table->string('name', 30)->nullable(false);
            $table->string('mobile', 11)->nullable(false); 
            $table->string('password', 256)->nullable(false);
            $table->string('api_token', 256)->nullable();
            $table->string('deleted_at')->nullable();
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
