@props(['feature' => $feature])

<div class="flex-col py-8 justify-center items-center text-center">
  <img class='h-40 m-auto' src="{{ $feature['image'] }}" alt="" />
  <h2 class='font-bold pt-4 text-lg'>{{ $feature['name'] }}</h2>
  <p>${{ number_format($feature['current_price'], 2) }}</p>
  @if ($feature['price_change_percentage_24h'] < 0)
    <div class='flex justify-center'>
      <span class='flex red'>
        {{ number_format($feature['price_change_percentage_24h'], 2) }}%
      </span>
    </div>
  @else
    <div class='flex justify-center'>
      <span class='flex green'>
        {{ number_format($feature['price_change_percentage_24h'], 2) }}%
      </span>
    </div>
  @endif
  @auth
    <form action="{{ route('dashboard') }}" method="post">
      @csrf
      <button type="submit" class="bg-blue-500 mt-2 text-white px-2 py-2 rounded font-light">Add to Watchlist</button>
    </form>
  @endauth
</div>