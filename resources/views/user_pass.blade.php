<h1>This is users</h1>

{{-- <h3>Hello {{$user}}</h3>
<h3>City: {{!empty($city) ? $city : 'No City'}}</h3> --}}

@foreach ($user as $key => $userData)
    <h2>{{$key}}, {{$userData['name']}} , {{$userData['email']}} , {{$userData['phone']}} , {{$userData['city']}} |
        <a href="{{ route('view.user', $key) }}">show</a>

    </h2>

@endforeach