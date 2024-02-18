<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $is_active
 * @property Carbon|null $email_verified_at
 * @property string|null $password
 * @property array|null $config
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Account[] $accounts
 * @property Collection|Journal[] $journals
 *
 * @package App\Models
 */
class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

	protected $table = 'users';

	protected $casts = [
		'is_active' => 'int',
		'email_verified_at' => 'datetime',
		'config' => 'json'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'is_active',
		'email_verified_at',
		'password',
		'config',
		'remember_token'
	];

	public function accounts()
	{
		return $this->hasMany(Account::class);
	}

	public function journals()
	{
		return $this->hasMany(Journal::class);
	}
}
