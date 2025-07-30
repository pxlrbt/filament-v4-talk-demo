<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Location;
use App\Models\Meetup;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Dennis',
            'email' => 'hey@denniskoch.dev',
        ]);

        User::factory()->create([
            'name' => 'Marius',
            'email' => 'marius@example.org',
        ]);

        User::factory()->create([
            'name' => 'Tanja',
            'email' => 'tanja@example.org',
        ]);

        User::factory()->create([
            'name' => 'Ed',
            'email' => 'ed@example.org',
        ]);

        User::factory()->create([
            'name' => 'Ives',
            'email' => 'ives@example.org',
        ]);

        User::factory()->create([
            'name' => 'Silvan',
            'email' => 'silvan@example.org',
        ]);

        User::factory()->create([
            'name' => 'Francesco',
            'email' => 'francesco@example.org',
        ]);

        User::factory()->create([
            'name' => 'Stefan',
            'association' => true,
            'email' => 'stefan@example.org',
        ]);

        User::factory()->create([
            'name' => 'Sandro',
            'association' => true,
            'email' => 'sandro@example.org',
        ]);

        User::factory()->create([
            'name' => 'Philipp',
            'association' => true,
            'email' => 'philipp@example.org',
        ]);

        User::factory()->create([
            'name' => 'Sascha',
            'association' => true,
            'email' => 'sascha@example.org',
        ]);

        User::factory()->create([
            'name' => 'Jan',
            'association' => true,
            'email' => 'jan@example.org',
        ]);


        Post::create(['title' => 'Test', 'author_id' => 1]);

        // Nested Resource demo

        $locations = [];
        $attendees = [];
        $meetups = [];

        $locations[] = Location::create([
            'name' => 'Novu Campus',
            'city' => 'Zurich',
        ]);

        $locations[] = Location::create([
            'name' => 'Liip Arena',
            'city' => 'Zurich',
        ]);

        $locations[] = Location::create([
            'name' => 'Infomaniak',
            'city' => 'Geneve',
        ]);

        $locations[] = Location::create([
            'name' => 'Byro',
            'city' => 'Aarau',
        ]);

        $locations[] = Location::create([
            'name' => 'Neustadt Agentur',
            'city' => 'Luzern',
        ]);

        for ($i = 0; $i < 12; $i++) {
            $date = today()
                ->setDay(28)
                ->setMonth($i + 1);

            $meetups[] = Meetup::create([
                'location_id' => $locations[random_int(0, count($locations) - 1)]->id,
                'name' => $date->format('M').' 25',
                'start' => $date,
            ]);
        }

        $attendees[] = Attendee::create([
            'name' => 'Dennis',
            'email' => 'hey@denniskoch.dev'
        ]);

        $attendees[] = Attendee::create([
            'name' => 'Stefan',
            'email' => 'stefan@laravel.swiss'
        ]);

        $attendees[] = Attendee::create([
            'name' => 'Philipp',
            'email' => 'philipp@laravel.swiss'
        ]);

        $attendees[] = Attendee::create([
            'name' => 'Sandro',
            'email' => 'sandro@laravel.swiss'
        ]);

        $attendees[] = Attendee::create([
            'name' => 'Sascha',
            'email' => 'sascha@laravel.swiss'
        ]);

        foreach ($meetups as $meetup) {
            foreach ($attendees as $attendee) {
                DB::table('attendee_meetup')
                    ->insert([
                        'meetup_id' => $meetup->id,
                        'attendee_id' => $attendee->id,
                    ]);
            }
        }
    }
}
