<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Portfolio Summary -->
            <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text">Portfolio Summary</h3>
                <div class="mt-4">
                    <div class="flex justify-between items-center">
                        <span class="text-secondary">Total Invested</span>
                        <span
                            class="text-text font-medium">${{ number_format(auth()->user()->TotalDeposit, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-secondary">Current Value</span>
                        <span
                            class="text-text font-medium">${{ number_format(auth()->user()->TotalDeposit, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-secondary">Total Return</span>
                        <span class="text-green-500 font-medium">
                            ${{ number_format(auth()->user()->TotalInvested, 2) }} 
                            {{-- ({{ number_format(auth->user()) }}%) --}}
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <flux:button href="{{ route('user.deposit') }}" wire:navigate variant="primary" class="w-full font-bold!">Add Investment</flux:button>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text">Recent Activity</h3>
                <div class="mt-4 space-y-4">
                    @if (auth()->user()->transactions->count() > 0)
                        @foreach (auth()->user()->transactions->take(3) as $transaction)
                            <div class="border-b border-gray-700 pb-3">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-text">{{ ucfirst($transaction->transaction_type) }}</p>
                                        <p class="text-xs text-secondary">
                                            {{ $transaction->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <span
                                        class="{{ in_array($transaction->transaction_type, ['deposit', 'interest', 'dividend']) ? 'text-green-500' : 'text-red-500' }} font-medium">
                                        {{ $transaction->formatted_amount }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-text-secondary">No recent activity</p>
                    @endif
                </div>

                <div class="mt-6">
                    <a href="#" class="block text-center text-accent hover:underline">
                        View All Activity
                    </a>
                </div>
            </div>

            <!-- Account Status -->
            <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text">Account Status</h3>
                <div class="mt-4">
                    <div class="flex justify-between items-center">
                        <span class="text-secondary">Investor Type</span>
                        <span
                            class="text-text">{{ auth()->user()->accredited_investor ? 'Accredited' : 'Standard' }}</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-secondary">Tolerance Profile</span>
                        <span class="text-text">{{ ucfirst(auth()->user()->risk_tolerance ?? 'Not set') }}</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-secondary">Investment Goal</span>
                        <span class="text-text">{{ ucfirst(auth()->user()->investment_goal ?? 'Not set') }}</span>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="bg-gray-800 rounded-lg p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-accent" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-text">Complete your profile to unlock more investment
                                    opportunities.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Your Investments -->
        <div class="mt-8">
            <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text">Investments</h3>

                @if (auth()->user()->deposit->count() > 0)
                    <div class="mt-4 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                        Amount</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                        Return</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                        Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach (auth()->user()->transactions->where('transaction_type', 'deposit') as $dpt)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                            {{ $dpt->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                            ${{ number_format($dpt->amount, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                            {{ $dpt->status === 'success'
                                                                ? 'bg-green-100 text-green-800'
                                                                : ($dpt->status === 'pending'
                                                                    ? 'bg-yellow-100 text-yellow-800'
                                                                    : 'bg-gray-100 text-gray-800') }}">
                                                {{ ucfirst($dpt->status) }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm {{ $dpt->performance_percentage > 0 ? 'text-green-500' : ($dpt->performance_percentage < 0 ? 'text-red-500' : 'text-text') }}">
                                            {{ number_format($dpt->performance_percentage, 2) }}%
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                            {{ $dpt->created_at ? $dpt->created_at->format('M d, Y') : 'Pending' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="mt-4 p-6 bg-gray-800 rounded-lg text-center">
                        <p class="text-text">You don't have any investments yet.</p>
                        <div class="mt-4">
                            <flux:button href="{{ route('user.deposit') }}" wire:navigate variant="primary" class="font-bold!">Add Investment</flux:button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
