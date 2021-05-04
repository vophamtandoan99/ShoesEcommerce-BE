<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);

        Role::create([
            'name' => 'Senior Staff',
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);

        Role::create([
            'name' => 'Staff',
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);

        Role::create([
            'name' => 'Vendor',
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);

        Role::create([
            'name' => 'Freelancer',
            'created_by' => 'sean.hsu@kkday.com',
            'updated_by' => 'sean.hsu@kkday.com'
        ]);
    }
}
