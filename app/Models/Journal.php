<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Journal
 *
 * @property int $id
 * @property int|null $type
 * @property Carbon $date
 * @property string|null $description
 * @property int $is_posted
 * @property int $user_id
 * @property Carbon $create_at
 * @property Carbon|null $update_at
 *
 * @property User $user
 * @property Collection|Transaction[] $transactions
 *
 * @package App\Models
 */
class Journal extends Model
{
	protected $table = 'journals';

	protected $casts = [
		'id' => 'int',
		'type' => 'int',
		'date' => 'datetime',
		'is_posted' => 'int',
		'user_id' => 'int',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'type',
		'date',
		'description',
		'is_posted',
		'user_id',
		'create_at',
		'update_at'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}
}
