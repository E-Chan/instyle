<?php

namespace Instyle\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Instyle\Models\User;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        if (!$query){
            return redirect()->route('home');
        }
        $users = User::where(DB::raw("CONCAT(fist_name, ' ', last_name)"), 'LIKE', "%{$query}%")
        ->orWhere('username', 'LIKE', "%{$query}%")
        ->get();

        return view('search.results')->with('users', $users);
    }
}