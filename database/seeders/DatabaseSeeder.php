<?php
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Machine;
use App\Models\User;
use App\Models\Malfunction;
use App\Models\tag;
use App\Models\project;


use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Roep de factories aan om gegevens voor elke tabel te maken
        Tag::factory()->count(6)->create();
        Project::factory(6)->create();

        User::factory()->create([
            'is_admin' => true,
            ]);

            User::factory()->create([
                'is_admin' => true,
                'email' => 'testing@example.com',
            ]);
    }
}
