<?php

use App\Models\Transaction;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

new #[Title('Transactions')] class extends Component {
    use WithPagination;

    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::where('user_id', Auth::id())->get();
    }
}; ?>

<div>
    <div class="mx-auto mt-10 p-4 md:p-6 bg-darker rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-white mb-6">Transaction History</h1>
        <flux:text class="mb-4">
            Explore your transaction trail! Track every step of your funding journey, 
            from instant BTC transfers to bank requests to interests.
        </flux:text>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-gray-900 rounded-lg">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-3 text-left text-sm font-medium rounded-tl-lg">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Amount</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Payment Method</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Transaction Type</th>
                        <th class="px-4 py-3 text-left text-sm font-medium">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-medium rounded-tr-lg">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors">
                            <td class="px-4 py-3 text-white">{{ $transaction['id'] }}</td>
                            <td class="px-4 py-3 text-white">${{ number_format($transaction['amount'], 2) }}</td>
                            <td class="px-4 py-3 text-white">{{ $transaction['payment_method'] ?? "-" }}</td>
                            <td class="px-4 py-3 text-white">{{ $transaction['transaction_type'] }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $transaction['status'] === 'Completed' ? 'bg-green-500 text-black' : 
                                       ($transaction['status'] === 'Pending' ? 'bg-yellow-500 text-black' : 
                                       'bg-red-500 text-white') }}">
                                    {{ $transaction['status'] }}
                                </span>
                            </td>
                        <td class="px-4 py-3 text-white">{{ $transaction['created_at']->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-400">
                                No transactions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
