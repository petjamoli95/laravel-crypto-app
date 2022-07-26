<?php

namespace App\Http\Controllers\Watchlist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Watchlist\DestroyWatchlistRequest;
use App\Http\Requests\Watchlist\StoreWatchlistRequest;
use App\Interfaces\CryptoDetailsInterface;
use App\Jobs\Watchlist\WatchlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    /**
     * @var CryptoDetailsInterface
     */
    private mixed $cryptoDetailsRepo;

    public function __construct()
    {
        $this->cryptoDetailsRepo = app(CryptoDetailsInterface::class);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cryptos = Auth::user()->cryptos;

        return view('pages.watchlist.index', compact('cryptos'));
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreWatchlistRequest $request)
    {
        // TODO: Create a middleware for getting the API ID from the request object
        $crypto = $this->cryptoDetailsRepo->findByApiId($request->api_id);
        WatchlistItem::dispatchSync(Auth::user(), $crypto);

        return back();
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DestroyWatchlistRequest $request)
    {
        $crypto = $this->cryptoDetailsRepo->findByApiId($request->api_id);

        // TODO: Make job for this
        $request->user()->cryptos()->detach($crypto);

        return back();
    }
}
