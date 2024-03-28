<?php

namespace App\Http\Controllers;

use App\Data\ClientData;
use App\Models\Guest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $clients = ClientData::collect(Guest::all());

        return Inertia::render('AnalyticsPage');
    }
    public function clients()
    {
        $clients = ClientData::collect(Guest::all());
        return Inertia::render('ClientsPage', [
            'clients' => $clients
        ]);
    }
    public function mailings()
    {
        return Inertia::render('MailingsPage');
    }
}
