<x-layouts.admin :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Dashboard Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <!-- Total Users Card -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-900 bg-opacity-50 text-blue-400">
                            <!-- User Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h4 class="text-2xl font-semibold text-white">
                                {{ number_format(Auth::user()->where('is_admin', 0)->count()) }}
                            </h4>
                            <div class="flex items-center">
                                <span class="text-gray-400">Total Users</span>
                                    <span class="ml-2 flex items-center text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                        %
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-900 px-6 py-3">
                    <a href="{{ route('admin.user.index') }}" wire:navigate
                        class="text-sm text-blue-400 font-medium hover:text-blue-300 transition-colors flex items-center">
                        View all users
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Total Deposits Card -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-900 bg-opacity-50 text-green-400">
                            <!-- Money Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h4 class="text-2xl font-semibold text-white">
                                ${{ number_format(App\Models\Transaction::where('transaction_type', 'deposit')->sum('amount'), 2) }}
                            </h4>
                            <div class="flex items-center">
                                <span class="text-gray-400">Total Deposits</span>
                                    <span class="ml-2 flex items-center text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                        %
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-900 px-6 py-3">
                    <a href="{{ route('admin.deposit.index') }}" wire:navigate
                        class="text-sm text-green-400 font-medium hover:text-green-300 transition-colors flex items-center">
                        View deposit history
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Total Investments Card -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-900 bg-opacity-50 text-purple-400">
                            <!-- Chart Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                        <div class="ml-5">
                            <h4 class="text-2xl font-semibold text-white">
                                ${{  number_format(App\Models\Transaction::where('transaction_type', '!=', 'withdrawal')->sum('amount'), 2) }}
                            </h4>
                            <div class="flex items-center">
                                <span class="text-gray-400">Total Investments</span>
                                    <span class="ml-2 flex items-center text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                        %
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-900 px-6 py-3">
                    <a href="#" wire:navigate
                        class="text-sm text-purple-400 font-medium hover:text-purple-300 transition-colors flex items-center">
                        View investment details
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
