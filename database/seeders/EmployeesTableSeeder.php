<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employees=[
            ['LastName'=>'Thái', 'FirstName'=>'Hưng', 'Email'=>'hung@gmail.com', 'Phone'=>'01234566'],
            ['LastName'=>'Chí', 'FirstName'=>'Công', 'Email'=>'cong@gmail.com', 'Phone'=>'011223344']
        ];
        //dùng vòng lặp để tạo dữ liệu mẫu trên bảng employees
        foreach($employees as $row){
          DB::table('employees')->insert($row);
        }
    }
}
