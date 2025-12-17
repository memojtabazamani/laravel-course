@props(['title' => '', 'footerLinks' => ''])
<x-base-layout :$title cssBodyClass="something">
    <x-layouts.header></x-layouts.header>
    {{ $slot }}
</x-base-layout>