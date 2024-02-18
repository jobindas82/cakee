<?php

namespace Database\Seeders;

use App\Constants\AccountClass;
use App\Constants\SysCode;
use App\Models\Account;
use App\Models\Config;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Roles
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Viewer']);
        Role::create(['name' => 'Editor']);

        $permissions = [
            'User-list',
            'User-alter',
            'Roles',
            'Journals',
            'Accounts',
            'Journals-post',
            'Reports-transactions',
            'Reports-Expenses',
            'Reports-Receivable',
        ];

        foreach($permissions as $each){
            Permission::create(['name' => $each]);
        }


        $user = User::create([
            'name' => 'Cakee Admin',
            'email' => 'admin@cakee.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'config' => [
                "sidebar" => "wide",
                "darkMode" => "light"
            ]
        ]);

        $user->markEmailAsVerified();
        $user->assignRole('Super Admin');

        Currency::create([
            'name' => 'Canadian Dollar',
            'symbol' => 'CAD',
            'ex_rate' => '1',
            'is_default' => '1',
        ]);

        Config::create([
            'name' => 'DEFAULT_CUR',
            'config' => json_encode(['id' => 1, 'symbol' => 'CAD', 'name' => 'Canadian Dollar']),
        ]);

        $accounts = [
            [
                'name' => 'Assets',
                'sys_code' => SysCode::ASSET_PARENT,
                'class' => AccountClass::ASSET,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Equity & Liabilities',
                'sys_code' => SysCode::LIABILITY_PARENT,
                'class' => AccountClass::LIABILITY,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Income',
                'sys_code' => SysCode::INCOME_PARENT,
                'class' => AccountClass::INCOME,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Expense',
                'sys_code' => SysCode::EXPENSE_PARENT,
                'class' => AccountClass::EXPENSE,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Current Assets',
                'class' => AccountClass::ASSET,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'parent_id' => 1,
                'route' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bank Accounts',
                'class' => AccountClass::ASSET,
                'sys_code' => SysCode::ASSET_BANK,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'parent_id' => 1,
                'route' => '1,5',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Receivable',
                'class' => AccountClass::ASSET,
                'sys_code' => SysCode::ASSET_RECEIVABLE,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'parent_id' => 1,
                'route' => '1,5',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Fixed Assets',
                'class' => AccountClass::ASSET,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'parent_id' => 1,
                'route' => '1',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Credit cards',
                'sys_code' => SysCode::LIABILITY_CC,
                'class' => AccountClass::LIABILITY,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'parent_id' => 2,
                'route' => '2',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Loans & Credit Lines',
                'sys_code' => SysCode::LIABILITY_LOAN,
                'class' => AccountClass::LIABILITY,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 1,
                'parent_id' => 2,
                'route' => '2',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Opening balance',
                'sys_code' => SysCode::EQUITY_OPENING,
                'class' => AccountClass::LIABILITY,
                'currency_id' => 1,
                'is_editable' => 0,
                'is_parent' => 0,
                'parent_id' => 2,
                'route' => '2',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
        ];
        foreach($accounts as $each){
            Account::create($each);
        }

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));

    }
}
