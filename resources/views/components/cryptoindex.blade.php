@props(['crypto' => $crypto])

<div class="flex-col py-4 justify-center items-center">
  <a href="{{ route('crypto.show', $crypto) }}" class='font-bold pt-4 text-lg'>{{ $crypto->name }} ({{ strtoupper($crypto->symbol) }})</a>
</div>