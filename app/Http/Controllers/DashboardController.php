<?php

namespace App\Http\Controllers;

use App\Interfaces\CryptoDetailsInterface;
use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;
use App\Models\CryptoDetails;

class DashboardController extends Controller
{
  private CryptoDetailsInterface $cryptodetailsRepository;

  public function __construct(CryptoDetailsInterface $cryptodetailsRepository)
  {
    $this->cryptodetailsRepository = $cryptodetailsRepository;
  }

    public function show()
    {
      $featured = $this->cryptodetailsRepository->getTopCryptoDetails();
      
      return view('dashboard', compact('featured'));
    }
}