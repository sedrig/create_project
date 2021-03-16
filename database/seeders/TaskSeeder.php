<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')
            ->insert([
                ['name' => 'header', 'status_id' => '1', 'project_id' => '1', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'header_wrapper', 'status_id' => '1', 'project_id' => '1', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'content', 'status_id' => '2', 'project_id' => '1', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'footer', 'status_id' => '2', 'project_id' => '1', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'connect DB', 'status_id' => '3', 'project_id' => '1', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'host', 'status_id' => '3', 'project_id' => '1', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],


                ['name' => 'header', 'status_id' => '1', 'project_id' => '2', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'header_wrapper', 'status_id' => '1', 'project_id' => '2', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'content', 'status_id' => '2', 'project_id' => '2', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'footer', 'status_id' => '2', 'project_id' => '2', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'connect DB', 'status_id' => '3', 'project_id' => '2', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ['name' => 'host', 'status_id' => '3', 'project_id' => '2', 'image' => 'tasks/mWl5lsBidmzRGY9m9SYqcjkj7BZZz64mljLsGgOf.jpg', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ]);
    }
}
