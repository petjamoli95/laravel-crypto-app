@extends('layouts.app')

@section('content')
  <div class="flex justify-center py-8">
    <div class="w-4/12">
      @if ($cryptos->count())
        @foreach ($cryptos as $crypto)
          <x-watchlistitem :crypto="$crypto" />
        @endforeach
      @else
      <p>Your watchlist is empty :(</p>
      @endif
    </div>
  </div>
@endsection