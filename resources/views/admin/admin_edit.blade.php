<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LARAVEL CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="card p-3">
                        <h2>Edit</h2>
                        <form action="{{ route('user_update', $user->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                            <div class="mb-3">
                                <label for="title">Nom</label>
                                <input type="text" name="name" class="form-control" id="title"
                                    value="{{ $user->name }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                     
                        

                     

                       
                            <button type="submit" class="btn btn-primary">Submit</button>


                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>