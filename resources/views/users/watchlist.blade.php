@extends('layouts.app')

@section('content')
  <div class="flex justify-center py-8">
    <div class="w-4/12">
      @foreach ($cryptos as $crypto)
        <x-watchlistitem :crypto="$crypto" />
      @endforeach
    </div>
  </div>
@endsection