@props(['title' => '', 'footerLinks' => ''])
<x-base-layout :$title cssBodyClass="something">
    <x-layouts.header></x-layouts.header>
    {{ $slot }}
    <footer>
        <a href="#">1</a>
        <a href="#">2</a>
        {{ $footerLinks }}
    </footer>

</x-base-layout>