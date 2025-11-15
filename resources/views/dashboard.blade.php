<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StandHub - Smart Stand Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        .hero-grid {
            background-image:
                linear-gradient(to right, rgba(102, 126, 234, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(102, 126, 234, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>

<body class="bg-white">

    <!-- NAVIGATION -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900">StandHub</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Features</a>
                    <a href="#how-it-works" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">How
                        It Works</a>
                    <a href="#pricing"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Pricing</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    <a href="/login"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition">
                        Log in
                    </a>
                    <a href="/register"
                        class="px-6 py-2 text-sm font-medium text-white gradient-bg rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="relative pt-32 pb-20 overflow-hidden hero-grid">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-purple-50 border border-purple-200 mb-8">
                    <span class="w-2 h-2 rounded-full bg-purple-500 animate-pulse"></span>
                    <span class="text-sm font-medium text-purple-700">New: AI-Powered Stand Recommendations</span>
                </div>

                <!-- Headline -->
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                    Manage Your Stands.<br />
                    <span class="text-gradient">Effortlessly.</span>
                </h1>

                <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                    The all-in-one platform for stand management. Book, track, and manage your exhibition stands with
                    unprecedented ease.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="/register"
                        class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-white gradient-bg rounded-full hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        Start Free Trial
                    </a>
                    <a href="#demo"
                        class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-gray-700 bg-white border-2 border-gray-200 rounded-full hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                        Watch Demo
                    </a>
                </div>

                <!-- Social Proof -->
                <div class="flex items-center justify-center gap-8 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="font-semibold">4.9/5</span> from 500+ reviews
                    </div>
                    <div class="hidden sm:block w-px h-4 bg-gray-300"></div>
                    <div>
                        Trusted by <span class="font-semibold">1,000+</span> vendors
                    </div>
                </div>
            </div>

            <!-- Hero Image/Mockup -->
            <div class="mt-20 relative float">
                <div class="relative mx-auto max-w-5xl">
                    <div class="absolute inset-0 gradient-bg rounded-3xl blur-3xl opacity-20"></div>
                    <div class="relative bg-white rounded-2xl shadow-2xl border border-gray-200 p-2">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&h=600&fit=crop"
                            alt="Dashboard Preview" class="w-full rounded-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section id="features" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Everything you need to <span class="text-gradient">succeed</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Powerful features designed to streamline your stand management workflow
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-200">
                    <div
                        class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lightning Fast</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Book stands in seconds with our intuitive interface. No complex forms or unnecessary steps.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-200">
                    <div
                        class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Secure & Reliable</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Enterprise-grade security with 99.9% uptime. Your data is always safe and accessible.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-200">
                    <div
                        class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Smart Analytics</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Real-time insights and analytics to help you make data-driven decisions for your business.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-200">
                    <div
                        class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Mobile Ready</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Manage your stands on the go. Fully responsive design works on any device, anywhere.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-200">
                    <div
                        class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Real-time Notifications</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Stay updated with instant notifications about bookings, payments, and important updates.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div
                    class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-200">
                    <div
                        class="w-14 h-14 rounded-xl gradient-bg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Team Collaboration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Work together seamlessly with your team. Assign roles, share updates, and stay organized.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Get started in <span class="text-gradient">3 simple steps</span>
                </h2>
                <p class="text-lg text-gray-600">
                    From sign up to your first booking in minutes
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <div
                        class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-3xl font-bold text-white mx-auto mb-6 shadow-lg">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Create Account</h3>
                    <p class="text-gray-600">
                        Sign up in seconds with your email. No credit card required for trial.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-3xl font-bold text-white mx-auto mb-6 shadow-lg">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Browse Stands</h3>
                    <p class="text-gray-600">
                        Explore available stands with detailed information and real-time availability.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-3xl font-bold text-white mx-auto mb-6 shadow-lg">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Book Instantly</h3>
                    <p class="text-gray-600">
                        Complete your booking with one click. Receive instant confirmation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING -->
    <section id="pricing" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Simple, <span class="text-gradient">transparent pricing</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Choose the plan that's right for you. No hidden fees.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Starter -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Starter</h3>
                    <p class="text-gray-600 text-sm mb-6">Perfect for individuals</p>
                    <div class="mb-6">
                        <span class="text-5xl font-bold text-gray-900">$19</span>
                        <span class="text-gray-600">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Up to 5 stands</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Basic analytics</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Email support</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full py-3 text-center font-semibold text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                        Get Started
                    </a>
                </div>

                <!-- Pro (Featured) -->
                <div
                    class="relative bg-white rounded-2xl p-8 shadow-xl border-2 border-purple-500 transform md:scale-105">
                    <div
                        class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 gradient-bg text-white text-sm font-semibold rounded-full">
                        Most Popular
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Professional</h3>
                    <p class="text-gray-600 text-sm mb-6">For growing businesses</p>
                    <div class="mb-6">
                        <span class="text-5xl font-bold text-gray-900">$49</span>
                        <span class="text-gray-600">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Unlimited stands</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Advanced analytics</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Priority support</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Team collaboration</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full py-3 text-center font-semibold text-white gradient-bg rounded-full hover:shadow-lg transition">
                        Get Started
                    </a>
                </div>

                <!-- Enterprise -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Enterprise</h3>
                    <p class="text-gray-600 text-sm mb-6">For large organizations</p>
                    <div class="mb-6">
                        <span class="text-5xl font-bold text-gray-900">Custom</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Everything in Pro</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Custom integrations</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Dedicated account manager</span>
                        </li>
                    </ul>
                    <a href="#contact"
                        class="block w-full py-3 text-center font-semibold text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-24 gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to transform your stand management?
            </h2>
            <p class="text-xl text-white/90 mb-10">
                Join thousands of vendors who trust StandHub for their business
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/register"
                    class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-purple-600 bg-white rounded-full hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    Start Free Trial
                </a>
                <a href="/login"
                    class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-purple-600 transition-all duration-300">
                    Sign In
                </a>
            </div>
            <p class="mt-8 text-white/80 text-sm">
                No credit card required • 14-day free trial • Cancel anytime
            </p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <!-- Company Info -->
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">StandHub</span>
                    </div>
                    <p class="text-sm leading-relaxed">
                        The smartest way to manage and book exhibition stands. Built for modern businesses.
                    </p>
                    <div class="flex items-center gap-4 mt-6">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.441 16.892c-2.102.144-6.784.144-8.883 0C5.282 16.736 5.017 15.622 5 12c.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0C18.718 7.264 18.982 8.378 19 12c-.018 3.629-.285 4.736-2.559 4.892zM10 9.658l4.917 2.338L10 14.342V9.658z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Product Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="#features" class="hover:text-white transition">Features</a></li>
                        <li><a href="#pricing" class="hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition">Integrations</a></li>
                        <li><a href="#" class="hover:text-white transition">Changelog</a></li>
                        <li><a href="#" class="hover:text-white transition">Roadmap</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Press Kit</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Resources Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Resources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition">API Reference</a></li>
                        <li><a href="#" class="hover:text-white transition">Support</a></li>
                        <li><a href="#" class="hover:text-white transition">Community</a></li>
                        <li><a href="#" class="hover:text-white transition">Status</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm">
                    © 2025 StandHub. All rights reserved.
                </p>
                <div class="flex items-center gap-6 text-sm">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>

</html>
