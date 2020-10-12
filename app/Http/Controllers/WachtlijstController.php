<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class WachtlijstController extends Controller
{
    public function role(Request $request){
        $role = $request->user()->Role;
        /* If user role redirect to user waitlist */
        if ($role == 'user'){
            $speltak = $request->user()->speltak;

            $dateTo = Date('d-m-Y');
            $dateFrom = $request->user()->signup_date;
            $dateDiff = date_diff(date_create($dateFrom), date_create($dateTo));

            $waitTime = $dateDiff->format('%d');

            return Inertia::render('Wachtlijst', [
                'speltak' => $speltak,
                'waittime' => $waitTime,
            ]);
        }

        /* If admin role redirect to admin waitlist */
        elseif ($role == 'admin'){
            $users = DB::table('users')
                ->whereNotNull('signup_date')
                ->orderBy('signup_date', 'asc')
                ->get();

            return Inertia::render('AdminWachtlijst', [
                'users' => $users,
            ]);
        }
    }

    public function search(Request $request)
    {
        $name = $request->input('name');

        $speltak = $request->input('speltak', '');

        $users = DB::table('users')
            ->whereNotNull('signup_date')
            ->where([
                ['name', 'LIKE', '%' . $name . '%'],
                ['speltak', 'LIKE', '%' . $speltak . '%'],
            ])
            ->orderBy('signup_date', 'asc')
            ->get();

        return Inertia::render('AdminWachtlijst', [
            'users' => $users,
        ]);
    }
}
