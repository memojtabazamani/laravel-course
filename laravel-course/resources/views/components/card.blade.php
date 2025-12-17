@props([
        'color' => 'red',
        'bgColor' => 'white',
        'footer' => 'Footer is here',
        'title' => 'Title'
])

<div {{ $attributes->merge(['lang' => 'ka'])->class("card card-text-$color card-bg-$bgColor") }}>
    <div {{ $title->attributes->class("card-header") }}>
        {{ $title }}
    </div>
    @if ($slot->isEmpty())
        [Content Is here]
    @else
        {{ $slot }}
    @endif

    <div class="card-footer">
        {{ $footer }}
    </div>
</div>