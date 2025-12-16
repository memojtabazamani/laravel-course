<h1>
    Hello From laravel course
</h1>

<p>
    My name is {{ $name }} {{ $surname }}
</p>
<p>
    Year: {{ $year }}
</p>
<p>
    {!!  $job  !!}
</p>

@{{ name }}
@verbatim
    <div>
        Name: {{ name }}
        Age: {{ age }}
        Job: {{ job }}
        Hobbies: {{ hobbies }}
    </div>
@endverbatim