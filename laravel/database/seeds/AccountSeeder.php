<?php
declare(strict_types=1);

use Illuminate\Database\Connection;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run(Connection $connection)
    {
        collect([
            [
                'account_number' => 'A00001',
                'balance' => 3000,
            ],
            [
                'account_number' => 'B00001',
                'balance' => 1000,
            ],
        ])->each(function ($values) use ($connection) {
            $connection->table('accounts')->insert($values);
        });
    }
}
