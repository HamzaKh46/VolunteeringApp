<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Nonprofits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Search Nonprofits</h1>

        <form action="{{ route('nonprofits.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input 
                    type="text" 
                    name="query" 
                    class="form-control" 
                    placeholder="Enter nonprofit name or keyword..." 
                    value="{{ request('query') }}"
                    required
                >
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if(isset($nonprofits['nonprofits']) && count($nonprofits['nonprofits']) > 0)
            <h2>Results for "{{ $query }}"</h2>
            <div class="list-group">
                @foreach ($nonprofits['nonprofits'] as $nonprofit)
                    <a href="{{ $nonprofit['profileUrl'] }}" target="_blank" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <img src="{{ isset($nonprofit['logoUrl']) && $nonprofit['logoUrl'] ? $nonprofit['logoUrl'] : asset('images/default_logo.jpg') }}" 
                                 alt="Logo" 
                                 class="me-3" 
                                 style="width: 50px; height: 50px; border-radius: 50%;">
                            <div>
                                <h5 class="mb-1">{{ $nonprofit['name'] }}</h5>
                                <p class="mb-1">{{ $nonprofit['description'] }}</p>
                                <small>Location: {{ $nonprofit['locationAddress'] ?? 'N/A' }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @elseif(isset($query))
            <p class="text-danger">No results found for "{{ $query }}".</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
