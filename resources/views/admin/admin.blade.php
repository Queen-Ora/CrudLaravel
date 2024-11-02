<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>LARAVEL CRUD</title>
</head>

<body>
    @if (Auth::check() && Auth::user()->is_admin)
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card shadow p-4">
                        <h2 class="mb-4 text-center">Ajouter un utilisateur</h2>
                        <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom de l'utilisateur</label>
                                <input type="text" name="name" class="form-control" id="name" autocomplete="off"
                                    value="{{ old('name') }}" placeholder="Entrer le nom d'utilisateur">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail de l'utilisateur</label>
                                <input type="email" name="email" class="form-control" id="email" autocomplete="off"
                                    value="{{ old('email') }}" placeholder="Entrer l'E-mail">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe de l'utilisateur</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}" placeholder="Entrer le mot de passe">
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="role" value="0">
                            <button type="submit" class="btn btn-primary w-100">Créer</button>
                        </form>
                        <a href="{{ route('logout') }}" class="btn btn-danger w-100 mt-3">Déconnexion</a>
                    </div>
                </div>
              
                <div class="col-md-7">
                    <h3 class="mb-4">Liste des utilisateurs</h3>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Editer</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="{{ route('edit', $user->id) }}" class="btn btn-warning btn-sm">Editer</a></td>
                                <td>
                                    <form action="{{ route('destroy', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1>Tableau de bord</h1>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Se déconnecter</a>
                        </div>
                        {{-- @if ($otherUsers->isEmpty())
                            <h3>Aucun autre utilisateur trouvé.</h3>
                        @else
                        @foreach ($otherUsers as $otherUser) --}}
                        <h3>Bienvenue, {{ Auth::user()->name }}</h3>  
                        {{-- @endforeach
                        @endif --}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</body>
</html>
@endif