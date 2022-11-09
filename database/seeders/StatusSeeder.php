<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Cancelled',
                'code' => 0,
                'class' => "text-danger",
            ],
            [
                'name' => 'Pending',
                'code' => 1,
                'class' => "text-secondary",
            ],
            [
                'name' => 'Processing',
                'code' => 2,
                'class' => "text-warning",
            ],
            [
                'name' => 'Successful',
                'code' => 3,
                'class' => "text-success",
            ],
            [
                'name' => 'Failed',
                'code' => 4,
                'class' => "text-danger",
            ],
        ];

        foreach ($statuses as $key => $status) {
            $exist = Status::where('name', $status)->count();

            if (!$exist) {
                Status::create($status);
            }
        }
    }
}
