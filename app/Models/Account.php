<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 *
 * @property int $id
 * @property string $name
 * @property int|null $user_id
 * @property string|null $number
 * @property string|null $sys_code
 * @property int $parent_id
 * @property string|null $share_with
 * @property int|null $class
 * @property string|null $route
 * @property int $currency_id
 * @property bool $is_active
 * @property bool $is_editable
 * @property bool $is_shared
 * @property Carbon $create_at
 * @property Carbon|null $update_at
 *
 * @property Account $account
 * @property Currency $currency
 * @property User|null $user
 * @property Collection|Account[] $accounts
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int',
		'parent_id' => 'int',
		'class' => 'int',
		'currency_id' => 'int',
		'is_active' => 'bool',
		'is_editable' => 'bool',
		'is_shared' => 'bool',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'name',
		'user_id',
		'number',
		'sys_code',
		'parent_id',
		'share_with',
		'class',
		'route',
		'currency_id',
		'is_active',
		'is_editable',
		'is_shared',
		'create_at',
		'update_at'
	];

	public function account()
	{
		return $this->belongsTo(Account::class, 'parent_id');
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function accounts()
	{
		return $this->hasMany(Account::class, 'parent_id');
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
