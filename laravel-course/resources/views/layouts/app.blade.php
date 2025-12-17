<x-base-layout>
    @include('layouts.partials.header')
    @extends('layouts.base')
        {{ $slot }}
    @section('childContent')
        @include('layouts.partials.header')
        @yield('content')
        @hasSection('footerLinks')
            <footer>
                @yield('footerLinks')
            </footer>
        @endif
    @endsection

</x-base-layout>