<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat satu perusahaan
        $company = Company::create([
            'name' => 'Tech Corp',
        ]);

        // Buat dua karyawan
        $employee1 = Employee::create([
            'name' => 'Alice',
            'company_id' => $company->id,
        ]);

        $employee2 = Employee::create([
            'name' => 'Bob',
            'company_id' => $company->id,
        ]);

        // Buat skill
        $skillPHP = Skill::create(['name' => 'PHP']);
        $skillLaravel = Skill::create(['name' => 'Laravel']);
        $skillVue = Skill::create(['name' => 'Vue.js']);

        // Hubungkan employee dengan skill (many to many)
        $employee1->skills()->attach([$skillPHP->id, $skillLaravel->id]);
        $employee2->skills()->attach([$skillVue->id]);
    }
}
