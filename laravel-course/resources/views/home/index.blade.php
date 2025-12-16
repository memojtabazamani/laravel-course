<h1>
    Hello From laravel course
</h1>
<!--
 Some text
 -->

{{-- Single line comment --}}

{{--
  Multi
  Line
  Comment
--}}

@if(true)
    This will be displayed
@endif

@foreach($hobbies as $h)
    {{ $loop->iteration }}
{{--    {{ dd($loop) }}--}}
{{--    {{ $h }}--}}
@endforeach

<div @class(
        [
            'my-css-class',
            'iran' => $country == 'ir'
        ])
@style([
    'color: green',
    'background-color: red' => $country == 'ir'
])>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt minus modi nisi ut voluptate. Animi eum fuga harum laboriosam maiores minus molestiae mollitia numquam odit, sed sequi similique sunt, veritatis.
</div>

@include('shared.button', ['color' => 'red', 'text' => 'Button view blade'])