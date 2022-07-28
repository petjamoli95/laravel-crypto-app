<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\CryptoDetailsInterface;

class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $featured = $this->cryptoDetailsRepo->top();
//        dd($featured);
        return view('pages.dashboard.index', compact('featured'));
    }
}
