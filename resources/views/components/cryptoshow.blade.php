@props(['crypto' => $crypto])

<div class="flex-col py-8 text-start justify-start items-start">
  <img class='h-40 m-start' src="{{ $crypto->image }}" alt="" />
  <h1 class="font-bold pt-4">{{ $crypto->name }}</h1>
  <p>Current Price: ${{ number_format($crypto->current_price, 2) }}</p>
  @if ($crypto->price_change_percentage_24h < 0)
    <div class='flex justify-start'>
      <span class='flex red'>
        {{ number_format($crypto->price_change_percentage_24h, 2) }}%
      </span>
    </div>
  @else
    <div class='flex justify-start'>
      <span class='flex green'>
        {{ number_format($crypto->price_change_percentage_24h, 2) }}%
      </span>
    </div>
  @endif
  @auth
  @if (!$crypto->crypto->watchlistedBy(Auth::user()))
    <form action="{{ route('crypto.store', $crypto) }}" method="post">
      @csrf
      <input type="hidden" name="api_id" value="{{ $crypto->api_id }}">
      <button type="submit" class="bg-blue-500 mt-2 text-white px-2 py-2 rounded font-light">Add to Watchlist</button>
    </form>
  @else
    <form action="{{ route('crypto.destroy', $crypto) }}" method="post">
      @csrf
      @method('DELETE')
      <input type="hidden" name="api_id" value="{{ $crypto->api_id }}">
      <button type="submit" class="bg-red-500 mt-2 text-white px-2 py-2 rounded font-light">Remove from Watchlist</button>
    </form>
  @endif
  @endauth
  <br>
  <div>
    <p>Market Cap Rank: {{ $crypto['market_cap_rank'] }}</p>
    <p>Market Cap: {{ $crypto['market_cap'] }}</p>
    <p>Fully Diluted Valuation: {{ $crypto['fully_diluted_valuation'] }}</p>
    <p>Total Volume: {{ $crypto['total_volume'] }}</p>
    <p>High 24h: {{ $crypto['high_24h'] }}</p>
    <p>Low 24h: {{ $crypto['low_24h'] }}</p>
    <p>Price Change 24h: {{ $crypto['price_change_24h'] }}</p>
    <p>Price Change Percentage 24h: {{ $crypto['price_change_percentage_24h'] }}</p>
    <p>Market Cap Change 24h: {{ $crypto['market_cap_change_24h'] }}</p>
    <p>Market Cap Change Percentage: {{ $crypto['market_cap_change_percentage_24h'] }}%</p>
    <p>Circulating Supply: {{ $crypto['circulating_supply'] }}</p>
    <p>Total Supply: {{ $crypto['total_supply'] }}</p>
    <p>Max Supply: {{ $crypto['max_supply'] }}</p>
    <p>ATH: ${{ $crypto['ath'] }}</p>
    <p>ATH Change Percentage: {{ $crypto['ath_change_percentage'] }}%</p>
    <p>ATH Date: {{ $crypto['ath_date'] }}</p>
    <p>ATL: ${{ $crypto['atl'] }}</p>
    <p>ATL Change Percentage: {{ $crypto['atl_change_percentage'] }}%</p>
    <p>ATL Date: {{ $crypto['atl_date'] }}</p>
  </div>
</div>