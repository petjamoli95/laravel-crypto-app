@props(['feature' => $feature])

<div class="flex-col py-8 justify-center items-center text-center">
  <img class='h-40 m-auto' src="{{ $feature['image'] }}" alt="" />
  <h2 class='font-bold pt-4 text-lg'>{{ $feature['name'] }}</h2>
  <p>${{ $feature['current_price'] }}</p>
  @if ($feature['price_change_percentage_24h'] < 0)
    <div class='flex justify-center'>
      <span class='flex red'>{{ $feature['price_change_percentage_24h'] }}%</span>
    </div>
  @else
    <div class='flex justify-center'>
      <span class='flex green'>{{ $feature['price_change_percentage_24h'] }}%</span>
    </div>
  @endif
</div>