<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {

            $table->id();
            $table->smallInteger('type')->nullable();
            $table->dateTime('date')->index();
            $table->string('description')->nullable();
            $table->smallInteger('is_posted')->default(1)->index();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id', 'fk_journals_users1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
