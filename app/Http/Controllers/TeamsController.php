<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Sent a listing of the resource.
     */
    public function json()
    {
        return 'json';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teams.index');
    }

}
