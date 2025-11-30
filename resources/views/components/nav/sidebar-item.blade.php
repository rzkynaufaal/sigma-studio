@props([
    'title',
    'icon',
    'route' => null,
])

@php
$isActive = $route ? request()->routeIs($route) : false;
@endphp

<flux:navlist.item
    icon="{{ $icon }}"
    :href="$route ? route($route) : '#'"
    :current="$isActive"
    wire:navigate
    class="sidebar-link {{ $isActive ? 'sidebar-active' : '' }}"
>
    {{ $title }}
</flux:navlist.item>
