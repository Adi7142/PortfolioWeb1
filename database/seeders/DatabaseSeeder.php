<?php
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Machine;
use App\Models\User;
use App\Models\Malfunction;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Roep de factories aan om gegevens voor elke tabel te maken
        Status::factory()->create(['name' => 'Open', 'severity' => 'normal']);
        Status::factory()->create(['name' => 'In Behandeling', 'severity' => 'major']);
        Status::factory()->create(['name' => 'Afgesloten', 'severity' => 'critical']);

        Machine::factory()->count(10)->create();
        User::factory()->count(10)->create();
        Malfunction::factory()->count(6)->create();

    }
}
