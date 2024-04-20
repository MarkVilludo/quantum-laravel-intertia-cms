<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $usersCount = User::count(); // Example data retrieval

        return Inertia::render('Dashboard', [
            'usersCount' => $usersCount,
        ]);
    }
}
