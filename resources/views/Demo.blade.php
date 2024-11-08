@php
    $color = ['red', 'blue', 'green', 'yellow', 'black'];
    $boolean  = null;
@endphp

@includeWhen(empty($boolean), 'pages.header', ['name' => $color])
@includeUnless(empty($boolean), 'pages.header', ['name' => $color])

<h1>This is Second Page</h1>

{{22 + 33}}
<br><br>

{{'Happy New Year'}}
<br><br>

{{'<h2>Have a nice day</h2>'}}
<br><br>

{!! "<h2>Thsi is UI</h2>" !!}

<br><br>

{{--{!! "<script>alert('this is alert')</script>" !!}--}}

@php
    $x = "super";
@endphp

{{$x}}

@php
    $color = ['red', 'blue', 'green', 'yellow'];
@endphp

<ul>
@foreach ( $color as $colors)
    
    {{-- @if ($loop->first)
    <li style="color: green;">{{$colors}}</li>
    @elseif ($loop->last)
    
    <li style="color: red">{{$colors}}</li>
    @else
    <li >{{$colors}}</li>
    @endif --}}

    @if ($loop->even)
        <li style="color: gray">{{$colors}}</li>
        @elseif ($loop->odd)
        <li style="color:blue">{{$colors}}</li>
    @endif
    
    {{-- <li>{{$loop->index}} - {{$colors}}</li><br> --}}
    {{-- <li>{{$loop->count}} - {{$colors}}</li> --}}
@endforeach
</ul>
@include('pages.footer', ['value' => '200']);



