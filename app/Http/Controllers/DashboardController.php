<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Services\TweetHistory\TweetHistory;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $bdrs = DB::connection('auto_master')->table('users')
            ->where('team_id',1)->wherenull('termination_date')
            ->inRandomOrder()
            ->get();

        $closers = DB::connection('auto_master')->table('users')
            ->where('team_id',2)->whereNull('termination_date')
            ->inRandomOrder()
            ->get();

        return view('dashboard')->with([
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster'),
            'initialTweets' => TweetHistory::all(),
            'usingNodeServer' => usingNodeServer(),
            'bdrs'              =>  $bdrs,
            'closers'           =>  $closers
        ]);
    }
}
