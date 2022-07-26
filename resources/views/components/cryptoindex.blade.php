@props(['crypto' => $cryptoDetail])
<div class="flex-col py-4 justify-center items-center">
  <a href="{{ route('crypto.show', $cryptoDetail) }}" class='font-bold pt-4 text-lg'>{{ $cryptoDetail->name }} ({{ strtoupper($cryptoDetail->symbol) }})</a>
</div>
