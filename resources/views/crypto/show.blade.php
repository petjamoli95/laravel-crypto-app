@extends('layouts.app')

@section('content')
  <div class="flex justify-center py-8">
    <div class="w-8/12">
      <x-cryptoshow :crypto="$crypto" />
    </div>
  </div>
@endsection