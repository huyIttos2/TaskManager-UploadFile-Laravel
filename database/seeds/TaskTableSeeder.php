<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrData = [];
        for($i = 0; $i < 20; $i++){
            array_push($arrData,[
               'inputTitle' => str_random(10),
               'inputContent' => str_random(10),
               'inputDueDate' => date('Y-m-d H:i:s'),
               'image' => str_random(10),
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        DB::table('tasks')->insert($arrData);
    }
}
