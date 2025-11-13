<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class AuthorDashboardController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('author.index', compact('tables'));
    }

}
