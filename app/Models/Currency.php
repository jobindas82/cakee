<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 *
 * @property int $id
 * @property string $name
 * @property string|null $symbol
 * @property bool $is_active
 * @property string|null $code
 * @property float|null $ex_rate
 * @property bool|null $is_default
 * @property Carbon $create_at
 * @property Carbon|null $update_at
 *
 * @property Collection|Account[] $accounts
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class Currency extends Model
{
	protected $table = 'currency';

	protected $casts = [
		'id' => 'int',
		'is_active' => 'bool',
		'ex_rate' => 'float',
		'is_default' => 'bool',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'name',
		'symbol',
		'is_active',
		'code',
		'ex_rate',
		'is_default',
		'create_at',
		'update_at'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
