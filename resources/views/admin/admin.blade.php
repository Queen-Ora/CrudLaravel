<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>LARAVEL CRUD </title>
</head>

<body>
    @if (Auth::check() && Auth::user()->is_admin)
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-5">

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card p-3">
                        <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2>Ajouter un utilisateur</h2>

                            <div class="mb-3">
                                <label for="name">Nom de l'utilisateur</label>
                                <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                    value="{{ old('name') }}" placeholder="Entrer le nom d'utilisateur">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">E-mail de l'utilisateur</label>
                                <input type="email" name="email" class="form-control" id="email" autocomplete="off"
                                    value="{{ old('email') }}" placeholder="Entrer l'E-mail">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Mot de passe de l'utilisateur</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}" placeholder="Entrer le mot de passe">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="role" value="0">

                            {{-- <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">

                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="body">Body</label>
                                <textarea name="body" class="form-control" id="body" rows="5" cols="30">
                                    {{ old('body') }}</textarea>

                                @error('body')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </form>
                        <a href="{{ route('logout') }}">
                            <button type="submit" class="btn btn-danger">Deconnexion</button>

                        </a>
                    </div>

                </div>
              
                <div class="col-md-7">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Body</th> --}}
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($users as $user)
<tr>
    <th scope="row">{{ $user->id }}</th>
    <td>{{ $user->name}}</td>
   
    <td>
       {{ $user->email }}
    </td>

    <td><a href="{{ route('edit', $user->id) }}" class="btn btn-warning">Editer</a></td>

    <td>
        <form action="{{ route('destroy', $user->id) }}" method="POST">
            @csrf
           
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </td>

  </tr>
@endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
@else
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Bonjour {{ Auth::user()->name }}
</body>
</html>
@endif