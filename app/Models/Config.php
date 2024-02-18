<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Config
 *
 * @property int $id
 * @property string $name
 * @property int $is_active
 * @property array|null $config
 * @property Carbon $create_at
 * @property Carbon|null $update_at
 *
 * @package App\Models
 */
class Config extends Model
{
	protected $table = 'configs';

	protected $casts = [
		'id' => 'int',
		'is_active' => 'int',
		'config' => 'json',
		'create_at' => 'datetime',
		'update_at' => 'datetime'
	];

	protected $fillable = [
		'name',
		'is_active',
		'config',
		'create_at',
		'update_at'
	];
}
