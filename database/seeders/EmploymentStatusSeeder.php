<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\EmploymentStatus;

class EmploymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dbPath = base_path().'/database';
        $json = File::get($dbPath.'/json/employmentStatus.json');
        $data = json_decode($json);
        foreach ($data as $item) {
        	EmploymentStatus::firstOrCreate([
                'status' => $item,
            ],[
                'description' =>  '...'
            ]);
        }
        $this->command->info('Employment Status seeded!');
    }
}
