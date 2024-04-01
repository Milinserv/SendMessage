<?php

namespace App\Http\Controllers;

use App\Data\ClientData;
use App\Data\SmsCampaignRecordData;
use App\Models\Guest;
use App\Models\SmsCampaignRecord;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $mailings = SmsCampaignRecord::all();

        return Inertia::render('AnalyticsPage', [
            'mailings' => $mailings
        ]);
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
        $clients = ClientData::collect(Guest::all());
        return Inertia::render('MailingsPage', [
            'clients' => $clients
        ]);
    }
}
