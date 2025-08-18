<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use App\Models\WebhookConfig;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
        return view('configs.index', [
            'configs' => WebhookConfig::orderBy('id', 'desc')->get(),
        ]);
    }


    public function clear(Request $request)
    {
        WebhookConfig::truncate();

        return redirect('/configs')->with('success', 'Configs cleared successfully.');
    }

    public function delete($id)
    {
        WebhookConfig::destroy($id);

        return redirect('/configs')->with('success', 'Configs delete successfully.');
    }

    public function create(Request $request)
    {
        return view('configs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_domain_url' => 'required',
            'to_domain_url' => 'required',
        ]);

        WebhookConfig::create($request->only('from_domain_url', 'to_domain_url'));

        return redirect('/configs')->with('success', 'Config created successfully.');
    }
}
