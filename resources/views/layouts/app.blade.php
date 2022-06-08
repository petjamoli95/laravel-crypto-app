<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coinwatch</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
  <nav class="p-6 bg-white flex justify-between">
    <ul class="flex items-center">
      <li>
        <a href="{{ route('dashboard') }}" class="p-3 text-2xl font-bold">Coinwatch</a>
      </li>
      <li>
        <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
      </li>
      <li>
        <a href="{{ route('watchlist') }}" class="p-3">Watchlist</a>
      </li>
    </ul>
    <ul class="flex items-center">
      <div class='text-gray-400 lg:block hidden mr-4'>
        <form class="border-2 rounded-lg" method="post" action="{{ route('crypto.index') }}">
          @csrf
          <input class='h-10 pl-2 pr-4 rounded-lg focus:outline-none' type='text' name='search' placeholder='Search...' />
          <button type='submit' class="mr-2 align-middle">
            <svg xmlns="http://www.w3.org/2000/svg" class="pb-1 text-gray-400 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>
        </form>
      </div>
      @auth
      <li>
        <a href="" class="p-3">{{ auth()->user()->username }}</a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="post" class="p-3 inline">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </li>
      @endauth
      @guest
      <li>
        <a href="{{ route('login') }}" class="p-3">Login</a>
      </li>
      <li>
        <a href="{{ route('register') }}" class="p-3">Register</a>
      </li>
      @endguest
    </ul>
  </nav>
  @yield('content')
</body>
</html>