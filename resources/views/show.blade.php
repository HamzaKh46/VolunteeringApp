<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])

<div class="container mx-auto mt-10">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <img class="w-full h-64 object-cover" src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
        
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $news->title }}</h1>
            <p class="text-sm text-gray-500 mb-4">Published on: {{ $news->publication_date }}</p>
            
            <p class="text-gray-700 leading-relaxed">
                {{ $news->content }}
            </p>
            
            
        </div>
    </div>
    <a href="{{route('welcome')}}" class="inline-flex items-center px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9l-5 5-5-5" />
        </svg>
        Back to Home
    </a>
</div>

