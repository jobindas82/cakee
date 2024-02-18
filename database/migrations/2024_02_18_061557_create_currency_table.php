<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name', 45)->unique('name_UNIQUE');
            $table->string('symbol', 45)->nullable()->unique('symbol_UNIQUE');
            $table->boolean('is_active')->default(1)->index();
            $table->string('code', 45)->nullable();
            $table->decimal('ex_rate', 10, 8)->nullable();
            $table->boolean('is_default')->nullable()->index();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency');
    }
}
