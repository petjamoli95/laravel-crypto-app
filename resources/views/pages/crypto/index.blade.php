@extends('layouts.app')

@section('content')
  <div class="flex justify-center py-8">
    <div class="w-8/12">
    @foreach ($cryptos as $crypto)
      <x-cryptoindex :crypto="$crypto" />
    @endforeach
    </div>
  </div>
@endsection