@props(['crypto' => $crypto])

<div class="flex-col py-8 text-start justify-start items-start">
  <img class='h-40 m-start' src="{{ $crypto[0]['image'] }}" alt="" />
  <h1 class="font-bold pt-4">{{ $crypto[0]['name'] }}</h1>
  <p>Current Price: ${{ number_format($crypto[0]['current_price'], 2) }}</p>
  @if ($crypto[0]['price_change_percentage_24h'] < 0)
    <div class='flex justify-start'>
      <span class='flex red'>
        {{ number_format($crypto[0]['price_change_percentage_24h'], 2) }}%
      </span>
    </div>
  @else
    <div class='flex justify-start'>
      <span class='flex green'>
        {{ number_format($crypto[0]['price_change_percentage_24h'], 2) }}%
      </span>
    </div>
  @endif
  <br>
  <div>
    <p>Market Cap Rank: {{ $crypto[0]['market_cap_rank'] }}</p>
    <p>Market Cap: {{ $crypto[0]['market_cap'] }}</p>
    <p>Fully Diluted Valuation: {{ $crypto[0]['fully_diluted_valuation'] }}</p>
    <p>Total Volume: {{ $crypto[0]['total_volume'] }}</p>
    <p>High 24h: {{ $crypto[0]['high_24h'] }}</p>
    <p>Low 24h: {{ $crypto[0]['low_24h'] }}</p>
    <p>Price Change 24h: {{ $crypto[0]['price_change_24h'] }}</p>
    <p>Price Change Percentage 24h: {{ $crypto[0]['price_change_percentage_24h'] }}</p>
    <p>Market Cap Change 24h: {{ $crypto[0]['market_cap_change_24h'] }}</p>
    <p>Market Cap Change Percentage: {{ $crypto[0]['market_cap_change_percentage_24h'] }}%</p>
    <p>Circulating Supply: {{ $crypto[0]['circulating_supply'] }}</p>
    <p>Total Supply: {{ $crypto[0]['total_supply'] }}</p>
    <p>Max Supply: {{ $crypto[0]['max_supply'] }}</p>
    <p>ATH: ${{ $crypto[0]['ath'] }}</p>
    <p>ATH Change Percentage: {{ $crypto[0]['ath_change_percentage'] }}%</p>
    <p>ATH Date: {{ $crypto[0]['ath_date'] }}</p>
    <p>ATL: ${{ $crypto[0]['atl'] }}</p>
    <p>ATL Change Percentage: {{ $crypto[0]['atl_change_percentage'] }}%</p>
    <p>ATL Date: {{ $crypto[0]['atl_date'] }}</p>
  </div>
</div>