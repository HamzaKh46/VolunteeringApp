<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">User List</h1>
        
        <div class="row">
            @foreach ($users as $user)
                @if ($user->role !== 'admin')
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body text-center">
                                <img 
                                    src="{{ asset('storage/' . ($user->picture ?? 'profile_photos/default.jpg')) }}" 
                                    class="rounded-circle img-fluid mb-3" 
                                    alt="{{ $user->name }}" 
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">
                                    <strong>Email:</strong> {{ $user->email }}<br>
                                    <strong>Birthday:</strong> {{ $user->dob ?? 'N/A' }}<br>
                                    <strong>About Me:</strong> {{ $user->about_me ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
