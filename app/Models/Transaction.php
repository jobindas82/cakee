<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 *
 * @property int $id
 * @property int $journal_id
 * @property int $account_id
 * @property int $currency_id
 * @property float $amount_b
 * @property float $amount
 * @property float $ex_rate
 * @property string|null $split_with
 * @property string|null $notes
 * @property Carbon $create_at
 * @property Carbon|null $update_at
 *
 * @property Account $account
 * @property Currency $currency
 * @property Journal $journal
 *
 * @package App\Models
 */
class Transaction extends Model
{
	protected $table = 'transactions';

	protected $casts = [
		'id' => 'int',
		'journal_id' => 'int',
		'account_id' => 'int',
		'currency_id' => 'int',
		'amount_b' => 'float',
		'amount' => 'float',
		'ex_rate' => 'float',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'journal_id',
		'account_id',
		'currency_id',
		'amount_b',
		'amount',
		'ex_rate',
		'split_with',
		'notes',
		'create_at',
		'update_at'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function journal()
	{
		return $this->belongsTo(Journal::class);
	}
}
