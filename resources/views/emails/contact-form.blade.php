<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Forms Submissions</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Emails from Contact Form</h1>

        @if (isset($error))
            <p class="text-red-600 bg-red-100 p-4 rounded border border-red-300">
                {{ $error }}
            </p>
        @else
            <div class="space-y-4">
                @foreach ($emails as $email)
                    <div class="bg-white shadow-md rounded p-6 border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">
                            Message: {{ $email['subject'] }}
                        </h3>
                        <p class="text-gray-600">
                            <strong class="text-gray-800">From:</strong> {{ $email['from_email'] }}
                        </p>
                        <p class="text-gray-600">
                            <strong class="text-gray-800">To:</strong> {{ $email['to_email'] }}
                        </p>
                        <p class="text-gray-600">
                            <strong class="text-gray-800">Sent At:</strong> {!! $email['sent_at'] !!}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
