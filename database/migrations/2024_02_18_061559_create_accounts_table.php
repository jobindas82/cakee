<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('number', 45)->nullable()->index();
            $table->string('sys_code', 15)->nullable()->index();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('share_with', 45)->nullable()->index();
            $table->smallInteger('class')->nullable();
            $table->string('route', 45)->nullable();
            $table->unsignedInteger('currency_id')->index();
            $table->boolean('is_active')->default(1)->index();
            $table->boolean('is_editable')->default(1)->index();
            $table->boolean('is_shared')->default(0)->index();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable();

            $table->foreign('currency_id', 'fk_accounts_currency1')->references('id')->on('currency');
            $table->foreign('user_id', 'fk_accounts_users1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
