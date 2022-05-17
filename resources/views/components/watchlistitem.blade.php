@props(['crypto' => $crypto])

<div class="flex-col py-8 justify-center items-center">
  <h2 class='font-bold pt-4 text-lg'>{{ $crypto->name }} ({{ strtoupper($crypto->symbol) }})</h2>
</div>