<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="bg-gray-100 text-gray-800">

    <section id="faq" class="my-5 py-5 bg-light">
        <div class="container mx-auto px-4">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">FAQ</h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Find answers to frequently asked questions below, categorized for easy navigation.
            </p>

            <div class="row">
                @foreach ($categories as $category)
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-blue-600 mb-4">{{ $category['name'] }}</h2>
                    <div class="bg-white p-4 rounded-lg shadow-xl py-8 mt-4">
                        @foreach ($category['faqs'] as $faq)
                        <div class="mt-4 flex">
                            <div>
                                <div class="flex items-center h-16 border-l-4 border-blue-600">
                                    <span class="text-4xl text-blue-600 px-4">Q.</span>
                                </div>
                                <div class="flex items-center h-16 border-l-4 border-gray-400">
                                    <span class="text-4xl text-gray-400 px-4">A.</span>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center h-16">
                                    <span class="text-lg text-blue-600 font-bold">{{ $faq['question'] }}</span>
                                </div>
                                <div class="flex items-center py-2">
                                    <span class="text-gray-500">{{ $faq['answer'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
        <a href="{{route('welcome')}}" class="inline-flex items-center px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg shadow-lg transition duration-200 ease-in-out transform hover:scale-105">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9l-5 5-5-5" />
            </svg>
            Back to Home
        </a>
    </section>

</body>
</html>
