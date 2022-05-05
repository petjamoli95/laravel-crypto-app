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
        <a href="" class="p-3">Watchlist</a>
      </li>
    </ul>
    <ul class="flex items-center">
      <li>
        <a href="" class="p-3">Petjamoli</a>
      </li>
      <li>
        <form action="" method="post" class="p-3 inline">
        <button type="submit">Logout</button>
        </form>
      </li>

      <li>
        <a href="" class="p-3">Login</a>
      </li>
      <li>
        <a href="" class="p-3">Register</a>
      </li>
    </ul>
  </nav>
  @yield('content')
</body>
</html>