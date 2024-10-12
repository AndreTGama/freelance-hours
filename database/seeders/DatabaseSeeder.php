<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Proposal;
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
        User::factory(200)->create();

        User::query()->inRandomOrder()->limit(10)->get()
            ->each(function (User $u) {
                $project = Project::factory()->create(['created_by' => $u->id]);

                Proposal::factory()
                    ->count(random_int(4, 45))
                    ->create([
                        'project_id' => $project->id,
                        'user_id' => User::query()->inRandomOrder()->first()->id
                    ]);

                $rankedProposals = DB::table('proposals')
                    ->select('id', DB::raw('ROW_NUMBER() OVER (ORDER BY hours ASC) as position'))
                    ->where('project_id', $project->id)
                    ->get();

                foreach ($rankedProposals as $proposal) {
                    DB::table('proposals')
                        ->where('id', $proposal->id)
                        ->update(['position' => $proposal->position]);
                }
            });
    }
}
