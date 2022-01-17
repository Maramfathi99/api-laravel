<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $job= \App\Models\Job::create([
            'title'=>'مهندس',
           'max_salary'=>1000,
           'min_salary'=>700,
            ]);

            $region= \App\Models\Region::create([
                'name'=>'الشرق الأوسط',
            
                ]);
                
                $country=\App\Models\Country::create([
                    'name'=>' فلسطين',
                    'region_id'=>$region->id,
                    ]);
   
// `street_address`, `postal_code`, `city`, `country_id`
                $location= \App\Models\Location::create([
                    'street_address'=>'الرمال شارع عمر المختار',
                    'postal_code'=>'00970',
                    'city'=>'غزة',
                    'country_id'=>$country->id,

                    ]);

                   $department=\App\Models\Department::create([
                        'name'=>'قسم الأبحاث',
                        'location_id'=>$location->id,
                    
                        ]);


// `fname`, `lname`, `phone`, `hire_date`, `salary`, `commission_pct`, `email`, `password`, `manager_id`, `department_id`, `job_id`
            \App\Models\User::create([
            'fname'=>'مرام',
            'lname'=>'البابا ',
            'phone'=>'0595847548',
            'hire_date'=> date('Y-m-d H:i:s'),
            'salary'=>500,
            'commission_pct'=>1.6,
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456789'),
            'manager_id'=>null,
            'department_id'=>$department->id,
            'job_id'=>$job->id,

    ]);



    }


}
