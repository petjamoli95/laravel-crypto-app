@props(['crypto' => $crypto])

<div class="flex-col py-8 justify-center items-center text-center">
  <img class='h-40 m-auto' src="{{ $crypto['image'] }}" alt="" />
  <p>${{ number_format($crypto['current_price'], 2) }}</p>
  @if ($crypto['price_change_percentage_24h'] < 0)
    <div class='flex justify-center'>
      <span class='flex red'>
        {{ number_format($crypto['price_change_percentage_24h'], 2) }}%
      </span>
    </div>
  @else
    <div class='flex justify-center'>
      <span class='flex green'>
        {{ number_format($crypto['price_change_percentage_24h'], 2) }}%
      </span>
    </div>
  @endif
  @auth
    <form action="{{ route('dashboard') }}" method="post">
      @csrf
      <input type="hidden" name="api_id" value="{{ $crypto['api_id'] }}">
      <button type="submit" class="bg-blue-500 mt-2 text-white px-2 py-2 rounded font-light">Add to Watchlist</button>
    </form>
    <form action="{{ route('dashboard.destroy', $crypto) }}" method="post">
      @csrf
      @method('DELETE')
      <input type="hidden" name="api_id" value="{{ $crypto['api_id'] }}">
      <button type="submit" class="bg-red-500 mt-2 text-white px-2 py-2 rounded font-light">Remove from Watchlist</button>
    </form>
  @endauth
</div>