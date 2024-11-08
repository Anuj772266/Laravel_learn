<h1>Employee Detailes</h1>

@foreach ($data as $id => $single )
    <h3>Name: {{$single->name}}</h3>
    <h3>Email: {{$single->email}}</h3>
    <h3>Age: {{$single->age}}</h3>
    <h3>City: {{$single->city}}</h3>
@endforeach