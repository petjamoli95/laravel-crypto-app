<?php

namespace App\Http\Controllers\Crypto;

use App\Http\Controllers\Controller;
use App\Interfaces\CryptoDetailsInterface;
use App\Models\CryptoDetails;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    /**
     * @var CryptoDetailsInterface
     */
    private CryptoDetailsInterface $cryptoDetailsRepo;

    /**
     * @param  CryptoDetailsInterface  $cryptoDetailsRepo
     */
    public function __construct(CryptoDetailsInterface $cryptoDetailsRepo)
    {
        $this->cryptoDetailsRepo = $cryptoDetailsRepo;
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $cryptos = $this->cryptoDetailsRepo->search($request->input('search'));

        return view('pages.crypto.index', compact('cryptos'));
    }

    /**
     * @param  CryptoDetails  $crypto
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(CryptoDetails $crypto)
    {
        $cryptoData = $crypto->coingeckoData();

        return view('pages.crypto.show', compact('cryptoData'));
    }
}
