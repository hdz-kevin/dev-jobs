<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    protected array $salaries = [
        '$0 - $499',
        '$500 - $749',
        '$750 - $999',
        '$1000 - $1499',
        '$1500 - $1999',
        '$2000 - $2499',
        '$2500 - $2999',
        '$3000 - $4999',
        '+$5000',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->salaries as $salary) {
            Salary::create(['salary' => $salary]);
        }
    }
}
