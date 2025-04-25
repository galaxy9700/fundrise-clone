<?php

use App\Models\Transaction;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('components.layouts.admin')] class extends Component {
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::where('transaction_type', 'deposit')->get();
    }
}; ?>

<div>
    <flux:heading size="lg">Deposits</flux:heading>

     <!-- Your Investments -->
     <div class="mt-8">
        <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-text">Investments</h3>

            @if ($transactions)
                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider sr-only">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $transaction->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $transaction->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        ${{ number_format($transaction->amount, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                        {{ $transaction->status === 'active'
                                                            ? 'bg-green-100 text-green-800'
                                                            : ($transaction->status === 'pending'
                                                                ? 'bg-yellow-100 text-yellow-800'
                                                                : 'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm {{ $transaction->performance_percentage > 0 ? 'text-green-500' : ($transaction->performance_percentage < 0 ? 'text-red-500' : 'text-text') }}">
                                        {{ number_format($transaction->performance_percentage, 2) }}%
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $transaction->created_at->format('M d, Y')  }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        <a href="{{ route('admin.deposit.edit', $transaction->id) }}" wire:navigate>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>                                          
                                        </a>
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
