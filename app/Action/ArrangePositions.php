<?php
namespace App\Action;

use Illuminate\Support\Facades\DB;

class ArrangePositions
{
    public static function run(int $id)
    {
        $rankedProposals = DB::table('proposals')
            ->select('id', DB::raw('ROW_NUMBER() OVER (ORDER BY hours ASC) as position'))
            ->where('project_id', $id)
            ->get();

        foreach ($rankedProposals as $proposal) {
            DB::table('proposals')
                ->where('id', $proposal->id)
                ->update(['position' => $proposal->position]);
        }
    }
}
