<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Economie;

class EconomieController extends Controller
{
    public function index()
    {
        $users = User::find(Auth::id());
        $somme = $users->economies->map(function($index){
            return $index->money;
        })->sum();

        return view('economie',compact('somme','users'));

    }

    public function addMoney(Request $request,Economie $economie)
    {

        $economie = new Economie();
        $economie->money = $request->money;
        $economie->currency = "euros";
        $economie->user_id = Auth::id();
        $economie->save();

        $users = User::find(Auth::id());
        $somme = $users->economies->map(function($index){
            return $index->money;
        })->sum();

        return $somme;

    }

    public function removeMoney(Request $request)
    {
        dd($request);
    }

    public function delete()
    {

    }

    public function show()
    {
        return 'show';
    }
}
