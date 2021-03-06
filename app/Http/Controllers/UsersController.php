<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{


    public function status(Request $request, $id){

        $user = User::query()->where('id',$id)->whereNotNull('team_id')
            ->whereNull('termination_date')->firstOrFail();

        $status = new \stdClass();
        $status->email = $user->email;
        $status->id = $user->id;
        $status->name = $user->name;
        $status->status = 'offline';
        $status->status_bool = false;

        $last_call = Carbon::parse($user->phone_client_last_call,config('app.timezone'));
        if($last_call->diffInMinutes(Carbon::now()) < 2){
            $status->status = 'online';
            $status->status_bool = true;
        }

        return response()->json($status);

    }

}
