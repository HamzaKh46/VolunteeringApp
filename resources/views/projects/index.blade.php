<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.css" rel="stylesheet">
@vite(['resources/css/app.css','resources/js/app.js'])


<section id="projects" class="my-5 py-5 bg-light">
    <div class="container">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Projects</h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Help the community by joining some projects.</p>
            
        <div class="row flex-wrap gap-4">
            @foreach ($projects as $project)
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 my-4">
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $project->name }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ Str::limit($project->description, 100, '...') }}
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            <strong>Tags:</strong>
            @foreach ($project->tags as $tag)
                <span class="text-sm inline-block px-2 py-1 text-blue-700 bg-blue-100 rounded dark:bg-blue-700 dark:text-blue-100">
                    {{ $tag->name }}
                </span>
            @endforeach
        </p>
        {{-- <a href="{{ route('projects.show', $project->id) }}" 
           class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            View Details
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a> --}}
    </div>
</div>
@endforeach
            
        </div>
    </div>
</section>
