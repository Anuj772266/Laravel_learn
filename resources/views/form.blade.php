<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
      <h1 class="mt-4 mb-3">Simple Form</h1>
      {{-- <pre>
        @php
          print_r($errors->all())
        @endphp
        </pre> --}}

        {{-- @if ($errors->any())
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $item)
          <li class="li">{{$item}}</li>
          @endforeach
        </ul>
        @endif --}}
       
        <form action="{{ route('userForm') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="username" >Name</label>
            <input type="text" value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror"  id="username" name="username">
            <span class="text-danger">
              <p>
                @error('username')
                {{ $message}}
              @enderror
              </p>
            </span>
          </div>
          <div class="mb-3">
            <label for="email" >Email</label>
            <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  id="email" name="email">
            <span class="text-danger">
              <p>
                @error('email')
                {{ $message }}
              @enderror
              </p>
            </span>
          </div>

          <div class="mb-3">
            <label for="password" >Password</label>
            <input type="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror"  id="password" name="password">
            <span class="text-danger">
              <p>
                @error('password')
                {{ $message }}
              @enderror
              </p>
            </span>
          </div>

          <div class="mb-3">
            <label for="phone" >Phone</label>
            <input type="text" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror"  id="phone" name="phone">
            <span class="text-danger">
              <p>
                @error('phone')
                {{ $message }}
              @enderror
              </p>
            </span>
          </div>
          <div class="mb-3">
            <label for="age" >Age</label>
            <input type="text" value="{{old('age')}}" class="form-control @error('age') is-invalid @enderror"  id="age" name="age">
            <span class="text-danger">
              <p> @error('age')
                {{$message}}
              @enderror
            </p>
            </span>
          </div>
          <div class="mb-3">
            <label for="city">City</label>
            <select name="city" value="{{old('city')}}" id="city" class="form-control @error('city') is-invalid @enderror">
                <option value="default">Select</option>
                <option value="jaipur">Jaipur</option>
                <option value="delhi">Delhi</option>
                <option value="patna">Patna</option>
                <option value="pune">Pune</option>
            </select>
            <span class="text-danger">
                <p>
                    @error('city')
                    {{ $message }}
                    @enderror
                </p>
            </span>
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  </div>
  
</body>
</html>
