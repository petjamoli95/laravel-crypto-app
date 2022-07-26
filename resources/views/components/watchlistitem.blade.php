@props(['crypto' => $crypto])

<div class="flex-col py-8 justify-center items-center">
  <a href="{{ route('crypto.show', $crypto) }}"><h2 class='font-bold pt-4 text-lg'>{{ $crypto->name }} ({{ strtoupper($crypto->symbol) }})</h2></a>
  <form action="{{ route('watchlist.destroy', $crypto) }}" method="post">
      @csrf
      @method('DELETE')
      <input type="hidden" name="api_id" value="{{ $crypto['api_id'] }}">
      <button type="submit" class="bg-red-500 mt-2 text-white px-2 py-2 rounded font-light">Remove from Watchlist</button>
    </form>
</div>
