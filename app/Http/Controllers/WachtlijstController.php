<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class WachtlijstController extends Controller
{
    public function index(Request $request) {
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
}
