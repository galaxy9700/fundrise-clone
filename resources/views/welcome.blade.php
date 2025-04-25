<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEXX</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            color: #e7e9ea;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
    
        .twitter-button {
            background-color: #ffff;
            color: black;
            border-radius: 9999px;
            transition: background-color 0.2s;
        }

    
        .twitter-button:hover {
            background-color: #ffffffd3;
        }
    
        .twitter-border {
            border-color: #2f3336;
        }
    
        .twitter-card {
            background-color: #16181c;
            border-radius: 16px;
            border: 1px solid #2f3336;
        }
    
        .nav-item:hover {
            background-color: rgba(239, 243, 244, 0.1);
            border-radius: 9999px;
        }
    
        .hero-gradient {
            background: linear-gradient(135deg, rgba(29, 161, 242, 0.1) 0%, rgba(0, 0, 0, 0) 60%);
        }
    
        .badge {
            background-color: rgba(29, 161, 242, 0.2);
            color: #1DA1F2;
            border-radius: 9999px;
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            display: inline-block;
        }
    
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.1s ease-in-out;
        }
    
        .mobile-menu.show {
            display: block;
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <!-- Header/Navigation -->
    <header class="sticky top-0 z-50 bg-black bg-opacity-80 backdrop-blur-md border-b twitter-border">
        <div class="container mx-auto px-4 flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-xl font-bold mr-2">H
                </div>
                <h1 class="text-xl font-bold hidden md:block">HEXX</h1>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="#investing" class="nav-item px-3 py-2 font-medium">Investing</a>
                <a href="#how-it-works" class="nav-item px-3 py-2 font-medium">How it Works</a>
                <a href="#insight" class="nav-item px-3 py-2 font-medium">Insight</a>
                <a href="#about" class="nav-item px-3 py-2 font-medium">About</a>
            </nav>

            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="hidden md:block hover:text-gray-300 px-4 py-2">Log in</a>
                <a href="{{ route('register') }}" class="twitter-button px-4 py-2 font-medium">Get Started</a>
                <button id="mobile-menu-button" class="md:hidden text-xl p-2 hover:bg-gray-900 rounded-full">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu"
            class="mobile-menu fixed top-0 right-0 h-full w-full  bg-black border-l twitter-border z-50 p-6 flex flex-col hidden">
            <div class="flex justify-between items-center h-full mb-8">
                <div class="flex items-center">
                    <div
                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-xl font-bold mr-2">
                        F</div>
                    <h1 class="text-xl font-bold">HEXX</h1>
                </div>
                <button id="close-menu-button" class="text-xl p-2 hover:bg-gray-900 rounded-full">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="flex flex-col space-y-4">
                <a href="#investing" class="px-4 py-3 hover:bg-gray-900 rounded-lg font-medium">Investing</a>
                <a href="#how-it-works" class="px-4 py-3 hover:bg-gray-900 rounded-lg font-medium">How it Works</a>
                <a href="#insight" class="px-4 py-3 hover:bg-gray-900 rounded-lg font-medium">Insight</a>
                <a href="#about" class="px-4 py-3 hover:bg-gray-900 rounded-lg font-medium">About</a>
                <a href="{{ route('login') }}" class="px-4 py-3 hover:bg-gray-900 rounded-lg font-medium">Log in</a>
            </nav>

            <div class="mt-auto">
                <a href="{{ route('register') }}" class="twitter-button w-full py-3 font-medium text-center block">Get Started</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-12 md:py-20 hero-gradient">
        <div class="container mx-auto px-4">
            <div class="flex flex-col gap-8 md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <div class="mb-4">
                        <span class="badge mb-4">As featured in Wall Street Journal</span>
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold mb-6">Invest in real estate portfolios built for you</h2>
                    <p class="text-lg mb-6 text-gray-400">Access institutional-quality private real estate with low
                        minimums and low fees</p>

                    <!-- Testimonial Preview in Hero -->
                    <div class="mb-8 twitter-card p-4 border border-blue-900">
                        <div class="flex items-center mb-2">
                            <div class="w-8 h-8 rounded-full bg-gray-700 mr-2">
                                <img class="w-h h-8 rounded-full" src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308" alt="">
                            </div>
                            <p class="font-medium text-sm">@Jesse654</p>
                            <div class="ml-2 text-blue-400">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <p class="text-sm mb-2">"I've earned 100% returns since joining HEXX. Best investment
                            decision I've made."</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="twitter-button px-6 py-3 font-medium text-center">
                            Get Started
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="border border-gray-700 hover:bg-gray-900 px-6 py-3 rounded-full text-center">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="twitter-card p-2 md:p-6 relative">
                        <img src="https://miro.medium.com/v2/resize:fit:1400/1*cMGfIQ8imKCMZonpKuk5lQ.jpeg" alt="Real estate investment" class="rounded-lg w-full">

                        <!-- Stats overlay -->
                        <div class="absolute bottom-3 md:bottom-10 left-10 right-10 twitter-card p-4 bg-opacity-95">
                            <div class="flex justify-between">
                                <div class="text-center">
                                    <h4 class="text-blue-400 text-lg font-bold">$10</h4>
                                    <p class="text-xs text-gray-400">Minimum</p>
                                </div>
                                <div class="text-center">
                                    <h4 class="text-blue-400 text-lg font-bold">8.8%</h4>
                                    <p class="text-xs text-gray-400">Avg Return</p>
                                </div>
                                <div class="text-center">
                                    <h4 class="text-blue-400 text-lg font-bold">400k+</h4>
                                    <p class="text-xs text-gray-400">Investors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted by Industry Leaders Section -->
    <div class="max-w-4xl mx-auto py-12 px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3 font-inter">Trusted by Industry Leaders</h2>
            <p class="text-white max-w-2xl mx-auto font-inter">We partner with the most respected names in real estate to
                bring you exclusive investment opportunities.</p>
        </div>
    
        <!-- Partners Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
            <!-- Zillow -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/37/2/zillow-logo-png_seeklogo-370701.png" alt="Zillow Logo"
                        class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- Redfin -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/33/2/redfin-logo-png_seeklogo-335748.png" alt="Redfin Logo"
                        class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- Trulia -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/25/2/trulia-logo-png_seeklogo-259525.png" alt="Trulia Logo"
                        class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- Century 21 -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/2/2/century-21-logo-png_seeklogo-28422.png"
                        alt="Century 21 Logo" class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- Compass -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/33/2/compass-inc-logo-png_seeklogo-337649.png" alt="Compass Logo"
                        class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- RE/MAX -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/11/2/remax-logo-png_seeklogo-117396.png" alt="RE/MAX Logo"
                        class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- Coldwell Banker -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/47/2/coldwell-banker-logo-png_seeklogo-479735.png"
                        alt="Coldwell Banker Logo"
                        class="h-40 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
    
            <!-- Keller Williams -->
            <div
                class="flex items-center justify-center p-4 border border-white rounded-lg hover:border-white transition-colors">
                <div class="h-12 flex items-center">
                    <img src="https://images.seeklogo.com/logo-png/18/2/keller-williams-logo-png_seeklogo-189396.png"
                        alt="Keller Williams Logo"
                        class="h-24 filter grayscale hover:filter-none transition-all duration-300">
                </div>
            </div>
        </div>
    
        <!-- Partnership CTA -->
        <div class="text-center p-6 bg-black border border-white rounded-lg">
            <p class="text-white mb-4 font-inter">Looking to partner with us? We're always open to new opportunities.</p>
            <a href="#"
                class="twitter-button inline-flex items-center px-6 py-2 rounded-full text-sm font-medium font-inter">
                Become a Partner
                <svg class="ml-2 w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Metrics Section -->
    <section class="py-12 bg-black border-y border-gray-800">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-10 text-center text-white">Key Metrics</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Metric Card 1 -->
                <div
                    class="bg-black border border-gray-800 rounded-xl p-6 hover:border-gray-700 transition-all duration-300">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 rounded-full bg-blue-900 bg-opacity-20 flex items-center justify-center mr-3">
                            <i class="fas fa-chart-line text-blue-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-300">Assets Under Management</h3>
                    </div>
                    <p class="text-3xl font-bold mb-2 text-white">$7B+</p>
                    <p class="text-gray-500 text-sm">Growing at over 20% year-over-year</p>
                    <div class="mt-5 flex items-center text-blue-400 text-sm font-medium">
                        <span>See performance details</span>
                        <i class="fas fa-chevron-right ml-2 text-xs"></i>
                    </div>
                </div>

                <!-- Metric Card 2 -->
                <div
                    class="bg-black border border-gray-800 rounded-xl p-6 hover:border-gray-700 transition-all duration-300">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 rounded-full bg-blue-900 bg-opacity-20 flex items-center justify-center mr-3">
                            <i class="fas fa-users text-blue-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-300">Active Investors</h3>
                    </div>
                    <p class="text-3xl font-bold mb-2 text-white">400k+</p>
                    <p class="text-gray-500 text-sm">From all 50 states and territories</p>
                    <div class="mt-5 flex items-center text-blue-400 text-sm font-medium">
                        <span>Read investor stories</span>
                        <i class="fas fa-chevron-right ml-2 text-xs"></i>
                    </div>
                </div>

                <!-- Metric Card 3 -->
                <div
                    class="bg-black border border-gray-800 rounded-xl p-6 hover:border-gray-700 transition-all duration-300">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 rounded-full bg-blue-900 bg-opacity-20 flex items-center justify-center mr-3">
                            <i class="fas fa-percentage text-blue-400"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-300">Average Annual Returns</h3>
                    </div>
                    <p class="text-3xl font-bold mb-2 text-white">8.8%</p>
                    <p class="text-gray-500 text-sm">Net of fees since inception</p>
                    <div class="mt-5 flex items-center text-blue-400 text-sm font-medium">
                        <span>View historical returns</span>
                        <i class="fas fa-chevron-right ml-2 text-xs"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Options -->
    <section id="investing" class="py-12 md:py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-10 text-center">Investment Options</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Investment Card 1 -->
                <div class="twitter-card overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308" alt="Starter Portfolio" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Starter Portfolio</h3>
                        <p class="text-gray-400 mb-4">Begin your real estate investing journey with just $10</p>
                        <div class="flex justify-between items-center">
                            
                            <a href="#" class="twitter-button px-4 py-2 text-sm">Invest Now</a>
                        </div>
                    </div>
                </div>

                <!-- Investment Card 2 -->
                <div class="twitter-card overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1680721445448-33ed9d682c3a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fHJlYWwlMjBlc3RhdGV8ZW58MHx8MHx8fDA%3D" alt="Growth Portfolio" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Growth Portfolio</h3>
                        <p class="text-gray-400 mb-4">Focus on long-term growth with diversified properties</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-sm text-gray-500">Min: $1,000</span> -->
                            <a href="#" class="twitter-button px-4 py-2 text-sm">Invest Now</a>
                        </div>
                    </div>
                </div>

                <!-- Investment Card 3 -->
                <div class="twitter-card overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHJlYWwlMjBlc3RhdGV8ZW58MHx8MHx8fDA%3D" alt="Income Portfolio" class="w-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Income Portfolio</h3>
                        <p class="text-gray-400 mb-4">Prioritize consistent dividend income streams</p>
                        <div class="flex justify-between items-center">
                            <!-- <span class="text-sm text-gray-500">Min: $5,000</span> -->
                            <a href="#" class="twitter-button px-4 py-2 text-sm">Invest Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-16 bg-black">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-center text-white">How It Works</h2>
            <p class="text-gray-400 text-center max-w-2xl mx-auto mb-12">Start your investment journey in minutes. Three
                simple steps to begin building wealth through real estate.</p>
    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="relative">
                    <div
                        class="w-12 h-12 rounded-full bg-blue-900 bg-opacity-20 border border-blue-400 flex items-center justify-center font-bold text-blue-400 mb-6 mx-auto">
                        1</div>
    
                    <div
                        class="absolute top-6 left-1/2 hidden md:block w-full h-0.5 bg-gradient-to-r from-blue-900 via-gray-800 to-transparent">
                    </div>
    
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold mb-3 text-white">Create your account</h3>
                        <p class="text-gray-400">Sign up in minutes with your email and payment information</p>
                    </div>
    
                    <div
                        class="border border-gray-800 rounded-xl p-4 mx-auto max-w-xs hover:border-gray-700 transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 rounded-full bg-gray-800 mr-3"></div>
                            <div>
                                <p class="text-white text-sm font-medium">@Willie5236</p>
                                <p class="text-gray-500 text-xs">Just now</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm">"Just created my HEXX account! Looking forward to my first real
                            estate investment."</p>
                    </div>
                </div>
    
                <!-- Step 2 -->
                <div class="relative">
                    <div
                        class="w-12 h-12 rounded-full bg-blue-900 bg-opacity-20 border border-blue-400 flex items-center justify-center font-bold text-blue-400 mb-6 mx-auto">
                        2</div>
    
                    <div
                        class="absolute top-6 left-1/2 hidden md:block w-full h-0.5 bg-gradient-to-r from-transparent via-gray-800 to-transparent">
                    </div>
    
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold mb-3 text-white">Choose your strategy</h3>
                        <p class="text-gray-400">Select from our tailored investment portfolios based on your goals</p>
                    </div>
    
                    <div class="border border-gray-800 rounded-xl p-4 mx-auto max-w-xs hover:border-gray-700 transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 rounded-full bg-gray-800 mr-3"></div>
                            <div>
                                <p class="text-white text-sm font-medium">@Billy</p>
                                <p class="text-gray-500 text-xs">1 month ago</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm">"Choosing a package with Hexx was a game-changer. It’s simple, transparent, and I feel confident about my investments!"</p>
                    </div>
                </div>
    
                <!-- Step 3 -->
                <div class="relative">
                    <div
                        class="w-12 h-12 rounded-full bg-blue-900 bg-opacity-20 border border-blue-400 flex items-center justify-center font-bold text-blue-400 mb-6 mx-auto">
                        3</div>
    
                    <div
                        class="absolute top-6 right-1/2 hidden md:block w-full h-0.5 bg-gradient-to-l from-blue-900 via-gray-800 to-transparent">
                    </div>
    
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold mb-3 text-white">Watch your money grow</h3>
                        <p class="text-gray-400">Track performance and receive instant dividends from your investment</p>
                    </div>
    
                    <div
                        class="border border-gray-800 rounded-xl p-4 mx-auto max-w-xs hover:border-gray-700 transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 rounded-full bg-gray-800 mr-3"></div>
                            <div>
                                <p class="text-white text-sm font-medium">@Theresa</p>
                                <p class="text-gray-500 text-xs">1 month ago</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm">"Just received my instant dividend of $10,000 from HEXX!
                            That's a 9.2% annualized return!"</p>
                        <div class="flex space-x-4 mt-3 text-gray-500 text-xs">
                            <span><i class="far fa-heart"></i> 102</span>
                            <span><i class="fas fa-retweet"></i> 28</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Elon Musk Section -->
    <section id="insight" class="py-16 bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center font-inter">Insights from Elon Musk</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Write-Up -->
                <div class="flex flex-col justify-center">
                    <h3 class="text-xl font-semibold text-white mb-4 font-inter">Elon Musk on Real Estate Investment</h3>
                    <p class="text-white mb-4 font-inter">
                        "Real estate is a cornerstone of wealth-building. It’s a tangible asset that stabilizes your
                        portfolio against market swings. With platforms like Hexx, anyone can invest in properties that
                        shape the future, starting with just a few dollars. Think big, start small, and build for the long
                        haul."
                    </p>
                    <p class="text-white italic font-inter">– Elon Musk, Visionary Entrepreneur</p>
                    <a href="{{ route('register') }}"
                        class="twitter-button px-6 py-2.5 mt-6 rounded-full text-sm font-semibold text-center w-fit font-inter">Start
                        Investing Now</a>
                </div>
                <!-- Video (YouTube Short) -->
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[360px] aspect-[9/16]">
                        <iframe class="w-full h-full rounded-lg border border-white"
                            src="https://www.youtube.com/embed/kapoqxxwpQs" title="Elon Musk YouTube Short" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 md:py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-10 text-center">What Our Investors Say</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="twitter-card p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-700 mr-4">
                            <img class="w-12 h-12 rounded-full"
                                src="https://img.freepik.com/free-photo/young-woman-freelancer-student-doing-homework-outdoor-cafe-drinking-her-coffee-street-using_1258-205389.jpg?ga=GA1.1.1822637080.1745077390&semt=ais_hybrid&w=740"
                                alt="">
                        </div>
                        <div>
                            <h4 class="font-bold">Sarah K.</h4>
                            <p class="text-gray-500">@sarahk • 2h</p>
                        </div>
                    </div>
                    <p class="mb-4">Started with HEXX 3 years ago and couldn't be happier with the consistent
                        returns. Their platform makes real estate investing so accessible!</p>
                    <div class="flex space-x-4 text-gray-500">
                        <span><i class="far fa-comment"></i> 12</span>
                        <span><i class="fas fa-retweet"></i> 34</span>
                        <span><i class="far fa-heart"></i> 89</span>
                        <span><i class="far fa-share-square"></i></span>
                    </div>
                </div>

                <div class="twitter-card p-6">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-700 mr-4">
                            <img class="w-12 h-12 rounded-full"
                                src="https://img.freepik.com/free-photo/cheerful-guy-enjoying-outdoor-coffee-break_1262-20005.jpg?semt=ais_hybrid&w=740"
                                alt="">
                        </div>
                        <div>
                            <h4 class="font-bold">Mark T.</h4>
                            <p class="text-gray-500">@markt_investor • 1d</p>
                        </div>
                    </div>
                    <p class="mb-4">Love how HEXX allows me to diversify my portfolio with real estate without
                        needing hundreds of thousands to get started. The instant dividends are a nice bonus!</p>
                    <div class="flex space-x-4 text-gray-500">
                        <span><i class="far fa-comment"></i> 8</span>
                        <span><i class="fas fa-retweet"></i> 22</span>
                        <span><i class="far fa-heart"></i> 67</span>
                        <span><i class="far fa-share-square"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modernized Elon Musk X Post Section with Screenshot -->
    <section id="about" class="py-16 bg-black">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white mb-12 text-center font-inter">The Future of Real Estate Value</h2>
            <!-- Screenshot of the Post -->
            <div class="flex justify-center mb-8">
                <img src="https://pbs.twimg.com/card_img/1913293772483645440/ppbVSyDZ?format=jpg&name=small"
                    alt="Screenshot of Elon Musk's X post about real estate value"
                    class="max-w-full sm:max-w-md h-auto border border-white rounded-lg opacity-75">
            </div>
            <!-- Write-Up -->
            <div class="text-center">
                <p class="text-white text-lg mb-6 font-inter">
                    Look, real estate isn’t just about buying land or buildings—it’s about investing in the future. I’ve seen the
                    data: homes with clean energy, like solar panels and a Powerwall, aren’t just cheaper to run—they’re worth more.
                    Why? Because they’re resilient. You’re not at the mercy of the grid when blackouts hit, and you’re not bleeding
                    money on utility bills. That’s a fundamental shift. The numbers don’t lie—Zillow showed homes with solar sell
                    for 4.1% more, and that’s just the start.
                </p>
                <p class="text-white text-lg mb-8 font-inter">
                    Now, imagine scaling that idea. Hexx gets this—they’re making it dead simple for anyone to invest in real
                    estate that’s built for tomorrow. You don’t need to be a billionaire to get in; start with $10 and own a piece
                    of properties that are driving the energy revolution. This isn’t charity—it’s smart business. Sustainable real
                    estate isn’t a niche; it’s the future. Get in now, or you’ll be kicking yourself in 10 years when everyone’s
                    doing it.
                </p>
                <!-- CTA -->
                <a href="{{ route('register') }}"
                    class="twitter-button px-8 py-3 rounded-full text-base font-semibold font-inter hover:shadow-xl transition-all duration-300">Invest
                    in the Future</a>
            </div>
        </div>
    </section>

    <!-- Modern CTA Section -->
    <section class="py-16 bg-black">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Modern Card Layout -->
                <div class="border border-gray-800 rounded-2xl overflow-hidden">
                    <!-- Header Section -->
                    <div class="p-8 border-b border-gray-800">
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="w-5 h-5 rounded-full bg-blue-400"></div>
                            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider">Limited Time Offer</h3>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Start your investment journey today</h2>
                        <p class="text-gray-400 text-lg">Join 400,000+ investors building wealth through real estate</p>
                    </div>
    
                    <!-- Split Content Section -->
                    <div class="flex flex-col md:flex-row">
                        <!-- Left Side - Features -->
                        <div class="md:w-1/2 p-8 border-b md:border-b-0 md:border-r border-gray-800">
                            <ul class="space-y-6">
                                <li class="flex items-start">
                                    <div
                                        class="mt-1 mr-4 w-6 h-6 rounded-full border border-gray-700 flex items-center justify-center">
                                        <i class="fas fa-check text-blue-400 text-xs"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white mb-1">Low Minimum</h4>
                                        <p class="text-gray-400 text-sm">Start with as little as $10 and increase over time
                                        </p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div
                                        class="mt-1 mr-4 w-6 h-6 rounded-full border border-gray-700 flex items-center justify-center">
                                        <i class="fas fa-check text-blue-400 text-xs"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white mb-1">Instant Dividends</h4>
                                        <p class="text-gray-400 text-sm">Earn instant income paid directly to your account
                                        </p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div
                                        class="mt-1 mr-4 w-6 h-6 rounded-full border border-gray-700 flex items-center justify-center">
                                        <i class="fas fa-check text-blue-400 text-xs"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white mb-1">Diversified Portfolio</h4>
                                        <p class="text-gray-400 text-sm">Access to a wide range of real estate properties
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
    
                        <!-- Right Side - CTA -->
                        <div class="md:w-1/2 p-8 flex flex-col justify-between">
                            <div class="mb-6">
                                <div class="flex items-center mb-6">
                                    <div class="flex -space-x-4 mr-4">
                                        <div class="w-10 h-10 rounded-full bg-gray-700 border-2 border-black">
                                            <img class="w-10 h-10 rounded-full" src="https://img.freepik.com/free-photo/portrait-smiling-confident-woman-feeling-ready-determined-cross-arms-chest-selfassured-looking-camera-standing-against-white-background_176420-53434.jpg?ga=GA1.1.1822637080.1745077390&semt=ais_hybrid&w=740" alt="">
                                        </div>
                                        <div class="w-10 h-10 rounded-full bg-gray-600 border-2 border-black">
                                            <img class="w-10 h-10 rounded-full"
                                                src="https://img.freepik.com/free-photo/cheerful-young-caucasian-businessman_171337-727.jpg?ga=GA1.1.1822637080.1745077390&semt=ais_hybrid&w=740"
                                                alt="">
                                        </div>
                                        <div class="w-10 h-10 rounded-full bg-gray-800 border-2 border-black">
                                            <img class="w-10 h-10 rounded-full" src="https://img.freepik.com/free-photo/picture-elegant-young-fashion-man_158595-533.jpg?ga=GA1.1.1822637080.1745077390&semt=ais_hybrid&w=740" alt="">
                                        </div>
                                    </div>
                                    <p class="text-gray-400 text-sm">Joined in the last 24 hours</p>
                                </div>
    
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-white font-medium">4.8/5</span>
                                </div>
                                <p class="text-gray-400 text-sm">Based on 12,400+ reviews</p>
                            </div>
    
                            <div>
                                <a href="{{ route('register') }}"
                                    class="block w-full bg-white hover:bg-gray-100 text-black font-bold px-6 py-4 rounded-full transition-all duration-300 text-center mb-4">
                                    Create Your Account
                                </a>
                                <a href="#"
                                    class="block w-full bg-transparent border border-gray-700 hover:border-gray-500 text-white font-medium px-6 py-4 rounded-full transition-all duration-300 text-center">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <!-- Footer -->
                    <div class="border-t border-gray-800 p-4 flex justify-between items-center bg-gray-900 bg-opacity-30">
                        <p class="text-gray-400 text-xs">No credit card required to get started</p>
                        <div class="flex items-center space-x-4">
                            <svg class="w-6 h-6 rounded" fill="#1DA1F2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" />
                            </svg>
                            <p class="text-gray-400 text-xs">Bank-level security</p>
                        </div>
                    </div>
                </div>
    
            <!-- Key Statistics -->
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="border border-gray-800 rounded-xl p-3 flex flex-col items-center justify-center text-center">
                    <p class="text-2xl font-bold text-white">$2B+</p>
                    <p class="text-xs text-gray-400">Total Invested</p>
                </div>
                <div class="border border-gray-800 rounded-xl p-3 flex flex-col items-center justify-center text-center">
                    <p class="text-2xl font-bold text-white">100,000+</p>
                    <p class="text-xs text-gray-400">Active Investors</p>
                </div>
                <div class="border border-gray-800 rounded-xl p-3 flex flex-col items-center justify-center text-center">
                    <p class="text-2xl font-bold text-white">8%+</p>
                    <p class="text-xs text-gray-400">Avg. Annual Return</p>
                </div>
                <div class="border border-gray-800 rounded-xl p-3 flex flex-col items-center justify-center text-center">
                    <p class="text-2xl font-bold text-white">50+</p>
                    <p class="text-xs text-gray-400">Real Estate Projects</p>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-10 border-t twitter-border">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">HEXX</h3>
                    <p class="text-gray-400">Real estate investing for everyone.</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Invest</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-gray-300">Starter Portfolio</a></li>
                        <li><a href="#" class="hover:text-gray-300">Growth Portfolio</a></li>
                        <li><a href="#" class="hover:text-gray-300">Income Portfolio</a></li>
                        <li><a href="#" class="hover:text-gray-300">Advanced Strategies</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Resources</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-gray-300">Help Center</a></li>
                        <li><a href="#" class="hover:text-gray-300">Learning Center</a></li>
                        <li><a href="#" class="hover:text-gray-300">FAQ</a></li>
                        <li><a href="#" class="hover:text-gray-300">Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-gray-300">About Us</a></li>
                        <li><a href="#" class="hover:text-gray-300">Careers</a></li>
                        <li><a href="#" class="hover:text-gray-300">Press</a></li>
                        <li><a href="#" class="hover:text-gray-300">Blog</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t twitter-border flex flex-col md:flex-row justify-between items-center">
                <!-- <div class="flex space-x-6 mb-4 md:mb-0">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin text-xl"></i></a>
                </div> -->

                <div class="text-gray-500 text-sm">
                    © 2025 HEXX, LLC. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            // Function to toggle the mobile menu
            function toggleMobileMenu() {
                mobileMenu.classList.toggle('show');

                // Add/remove overlay and prevent scrolling when menu is open
                if (mobileMenu.classList.contains('show')) {
                    document.body.style.overflow = 'hidden';

                    // Create an overlay
                    const overlay = document.createElement('div');
                    overlay.id = 'menu-overlay';
                    overlay.className = 'fixed inset-0 bg-black bg-opacity-50 z-40';
                    overlay.addEventListener('click', toggleMobileMenu);
                    document.body.appendChild(overlay);
                } else {
                    document.body.style.overflow = '';

                    // Remove overlay
                    const overlay = document.getElementById('menu-overlay');
                    if (overlay) {
                        overlay.remove();
                    }
                }
            }

            // Event listeners for opening and closing the menu
            mobileMenuButton.addEventListener('click', toggleMobileMenu);
            closeMenuButton.addEventListener('click', toggleMobileMenu);

            // Close menu when resizing to desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768 && mobileMenu.classList.contains('show')) {
                    toggleMobileMenu();
                }
            });
        });
    </script>
</body>
</html>