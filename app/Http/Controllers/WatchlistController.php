<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth']);
    }
    
    public function show()
    {
      $cryptos = Auth::user()->cryptos;

      return view('users.watchlist', compact('cryptos'));
    }

    public function store(Request $request)
    {
      $item = Crypto::where('api_id', $request->api_id)->first();

      if ($item->watchlistedBy($request->user())) {
        return back();
      }
      $item->users()->attach([
        'user_id' => $request->user()->id
      ]);

      return back();
    }

    public function destroy(Request $request)
    {
      $item = Crypto::where('api_id', $request->api_id)->first();

      $request->user()->cryptos()->detach($item->id);

      return back();
    }
}