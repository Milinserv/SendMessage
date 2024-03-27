<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('AnalyticsPage');
    }
    public function clients()
    {
        return Inertia::render('ClientsPage');
    }
    public function mailings()
    {
        return Inertia::render('MailingsPage');
    }
}
