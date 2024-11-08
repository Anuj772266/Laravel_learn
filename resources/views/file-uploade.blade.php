<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h2 class=" mt-4">File Upload</h2>
            </div>
        </div>
        <form action="{{ route('file-upload.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
            <div class="row text-center">
                <div class="col-9">
                    {{-- <input type="file" name="photo" accept="image/*"> --}}
                    {{-- <input type="file" name="photo" accept="video/*"> --}}
                    {{-- <input type="file" name="photo" accept="audio/*"> --}}
                    <input type="file" name="photo" accept=".jpg,.png,.jpeg">
                    @error('photo')
                        <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-10 mt-2">
                    <input type="submit" class="btn btn-sm btn-primary">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-6">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @if($user && $user->count())
                @foreach ($user as $users)
                    <div class="col-2">
                        <img class="img-fluid img-thumbnail" src="{{ asset('/storage/' . $users->file_name) }}" alt="">
                        <form action="{{ route('file-upload.destroy', $users->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mb-3">Delete</button>
                        </form>
                        <a href="{{ route('file-upload.edit', $users->id) }}" class="btn btn-warning btn-sm mb-3">Update</a>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p>No files found.</p>
                </div>
            @endif
        </div>


    </div>
</body>
</html>
