<div wire:poll.1s="tick">
    <p class="text-white text-xl">
        Waktu berjalan: {{ gmdate('H:i:s', $elapsed) }}
    </p>
</div>
