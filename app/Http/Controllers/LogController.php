<?php

// app/Http/Controllers/LogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('user')->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.logs.index', compact('logs'));
    }
}
