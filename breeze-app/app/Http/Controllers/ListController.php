<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('list', compact('users'));
    }
}
