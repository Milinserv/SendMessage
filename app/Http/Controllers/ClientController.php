<?php

namespace App\Http\Controllers;

use App\Data\ClientData;
use App\Services\ActionClient;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function store(ClientData $request, ActionClient $service)
    {
        $client = $service->make($request);

        return Inertia::location(route('clients'));
    }
}
