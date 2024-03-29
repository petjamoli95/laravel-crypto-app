@props(['crypto' => $crypto])

<div class="flex-col py-8 justify-center items-center text-center">
  <a href="{{ route('crypto.show', $crypto) }}">
    <img class='h-40 m-auto' src="{{ $crypto['image'] }}" alt="" />
    <h1 class="font-bold pt-4">{{ $crypto['name'] }}</h1>
  </a>
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
  @if (!$crypto->watchlistedBy(Auth::user()))
    <form action="{{ route('watchlist.store') }}" method="post">
      @csrf
      <input type="hidden" name="api_id" value="{{ $crypto['api_id'] }}">
      <button type="submit" class="bg-blue-500 mt-2 text-white px-2 py-2 rounded font-light">Add to Watchlist</button>
    </form>
  @else
    <form action="{{ route('watchlist.destroy', $crypto) }}" method="post">
      @csrf
      @method('DELETE')
      <input type="hidden" name="api_id" value="{{ $crypto['api_id'] }}">
      <button type="submit" class="bg-red-500 mt-2 text-white px-2 py-2 rounded font-light">Remove from Watchlist</button>
    </form>
  @endif
  @endauth
</div>
