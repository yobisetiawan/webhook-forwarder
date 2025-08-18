<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('dashboard.index', [
            'webhooks' => Webhook::orderBy('id', 'desc')->get(),
        ]);
    }


    public function clear(Request $request)
    {
        Webhook::truncate();

        return redirect('/dashboard')->with('success', 'Webhooks cleared successfully.');
    }
}
