@extends('layouts.app')

@section('content')
  <div class="flex justify-center py-8">
    <div class="w-4/12">
      @if (session('status'))
        <div class="bg-red-500 text-white px-4 py-3 rounded font-medium w-full text-center">
        {{ session('status') }}
        </div>
      @endif
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="my-4">
          <label for="username" class="sr-only">Username</label>
          <input type="text" name="username" id="username" placeholder="Username"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('username') border-red-500 @enderror" value="{{ old('username') }}">
          @error('username')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" placeholder="Choose a password"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('password') border-red-500 @enderror">
          @error('password')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-4">
          <div class="flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember">Remember me</label>
          </div>
        </div>

        <div>
          <button type="submit" class="bg-black text-white px-4 py-3 rounded font-medium w-full">Login</button>
        </div>
      </form>
    </div>
  </div>
@endsection