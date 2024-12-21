<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    


</head>
<body class="bg-gray-100">

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ImpactHub </span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    {{-- <a
                                        href="{{ route('dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a> --}}
                                    

                                </a>

                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('storage/' . $user_info->picture) }}" class="w-12 h-12 rounded-full" alt="{{ $user_info->name }}" /><span class="text-dark">{{ $user_info->name }}</span>
                  </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    @if(Auth::user()->role === 'admin')
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        <i class="align-middle me-1" data-feather="pie-chart"></i> Dashboard
                                    </a>
                                @endif                                    <div class="dropdown-divider"></div>
    
    
                                    <form  action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button type="submit" class="btn btn-danger d-flex align-items-center">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </div>



                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
            </div>
        </div>
    </nav>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#discover" class="text-gray-900 dark:text-white hover:underline">Discover</a>
                    </li>
                    <li>
                        <a href="#news" class="text-gray-900 dark:text-white hover:underline">News</a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}" class="text-gray-900 dark:text-white hover:underline">FAQ</a>
                    </li>
                    <li>

                        <a href="{{ route('contact.send') }}" class="text-gray-900 dark:text-white hover:underline">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('showUsers') }}" class="text-gray-900 dark:text-white hover:underline">Users</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('projects.index') }}" class="text-gray-900 dark:text-white hover:underline">Projects</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    




    


    <!-- Discover Nonprofit Organizations Section -->
    <section id="discover" class="my-5 py-5 bg-light">
        <div class="container mx-auto py-16 text-center">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Discover Nonprofit Organizations
            </h1>
            <p class="text-lg text-gray-500 dark:text-gray-400 mb-6">
                Explore the causes you care about and connect with nonprofit organizations making a difference in your community.
            </p>
            <a href="{{route('nonprofits.search')}}" class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Discover Now
                <svg class="ms-2 rtl:rotate-180 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        
    </section>

    <!-- List of Fundraisers Section -->
    <section id="fundraisers" class="my-5 py-5">
        <div class="container ">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Fundraisers</h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Browse through ongoing fundraisers and support the causes that matter to you.</p>
 
            
            <div class="row flex-wrap gap-4">
                <!-- Fundraiser Card -->
                

<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Stronger Teachers, Stronger Students #GivingTuesday</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Robinson School, an independent college-preparatory institution since 1902, offers a competitive curriculum from toddlerhood to 12th grade. Dedicated to educational excellence in Puerto Rico, the school continually evolves to support its teachers and students, emphasizing respect and academic achievement. This year, Robinson School proudly joins the #GivingTuesday campaign to enhance its programs and support the Dr. Francisco Hernández y Manuel Gaetán Elementary School. Together, they aim to shape future leaders and foster a stronger community. Donate today to empower teachers and students alike!</p>
    <a href="fundraiser/robinson-school-inc/stronger-teachers-stronger" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Donate
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>



<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">The Difference Starts with You</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Women leaders worldwide are driving progress, preventing conflict, and building peace in crisis-affected regions like Afghanistan, Ukraine, Palestine, and Myanmar. Through the United Nations Women’s Peace and Humanitarian Fund (WPHF), they provide essential services such as shelter, legal aid, and support for marginalized communities. Join WPHF’s #1000WomenLeaders Campaign to empower these changemakers. Every dollar donated this holiday season will be matched up to $15,000, doubling your impact. Help support women creating a more peaceful, equitable world. Donate now.</p>
    <a href="fundraiser/wphfund/wphf-giving-tuesday" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Donate
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>



<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Right to Education Marathon: United Against Scholasticide</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Support Gaza’s students through the Right to Education Marathon on November 29, 2024, the International Day of Solidarity with the Palestinian People. Organized by Taawon and key education partners, this event aids the ISNAD program, providing essential scholarships for university students in Gaza. Your $10 ticket—or any donation amount—helps ensure students can continue their education despite ongoing challenges. Stand with Gaza in their pursuit of resilience and hope for a brighter future.

        For more details, visit: Right to Education Marathon | Taawon.</p>
    <a href="fundraiser/welfare-association-ch/right-to-education-marathon" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Donate
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>



            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="my-5 py-5 bg-light">
        <div class="container">
            {{-- <a href="#"> --}}
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">News</h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Stay updated with the latest news about our fundraising efforts and nonprofit organizations.</p>
                
            <div class="row flex-wrap gap-4">
                <!-- News Card -->
                @foreach ($news_info as $item)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($item->content, 100, '...') }}</p>
                <a href="{{route('show.new', $item->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read More
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
                
            </div>
        </div>
    </section>


    



    

</body>
</html>
