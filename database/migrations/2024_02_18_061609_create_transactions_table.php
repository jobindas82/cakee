<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {

            $table->unsignedInteger('id')->primary();
            $table->unsignedInteger('journal_id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('currency_id');
            $table->decimal('amount_b', 10, 3);
            $table->decimal('amount', 10, 3);
            $table->decimal('ex_rate', 10, 8);
            $table->string('split_with', 45)->nullable()->index();
            $table->string('notes', 45)->nullable()->index();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable();

            $table->foreign('account_id', 'fk_transactions_accounts1')->references('id')->on('accounts');
            $table->foreign('currency_id', 'fk_transactions_currency1')->references('id')->on('currency');
            $table->foreign('journal_id', 'fk_transactions_journals')->references('id')->on('journals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
