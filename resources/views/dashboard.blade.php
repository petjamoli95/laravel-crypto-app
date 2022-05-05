@extends('layouts.app')

@section('content')
  <div class="grid lg:grid-cols-5 sm:grid-cols-2">
    @foreach ($featured as $feature)
      <x-featured :feature="$feature" />
    @endforeach
  </div>
@endsection