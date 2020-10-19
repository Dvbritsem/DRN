<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use mysql_xdevapi\Table;

class WachtlijstController extends Controller
{
    public function role(Request $request)
    {
        $role = $request->user()->Role;
        /* If user role redirect to user waitlist */
        if ($role == 'user') {
            $speltak = $request->user()->speltak;

            $dateTo = Date('d-m-Y');
            $dateFrom = $request->user()->signup_date;
            $dateDiff = date_diff(date_create($dateFrom), date_create($dateTo));

            $waitTime = $dateDiff->format('%d');

            return Inertia::render('Wachtlijst', [
                'speltak' => $speltak,
                'waittime' => $waitTime,
            ]);
        } /* If admin role redirect to admin waitlist */
        elseif ($role == 'admin') {
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

    public function view($id)
    {
        $role = auth()->user()->Role;

        //Check if user is not null//
        $userid = DB::table('users')
            ->where('id', $id)
            ->exists();

        if ($userid == true && $role == 'admin') {
            $lid = DB::table('users')
                ->where('id', $id)
                ->limit(1)
                ->get();

            return Inertia::render('UserInfo', [
                'lid' => $lid[0],
            ]);
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($request->input('id'))],
            'birthday' => ['required', 'date'],
            'speltak' => ['required', 'string'],
        ])->validateWithBag('updateUserInformation');

        DB::table('users')
            ->where('id', $request->input('id'))
            ->limit(1)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'birthday' => $request->input('birthday'),
                'speltak' => $request->input('speltak'),
            ]);

        return redirect()->route('UserInfo', $request->input('id'));
    }
}
