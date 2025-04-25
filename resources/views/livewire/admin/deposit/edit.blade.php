<?php

use App\Models\Transaction;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('components.layouts.admin')] class extends Component {

    public $transaction = '';

        public function mount($transaction)
        {
        $this->transaction = Transaction::findOrFail($transaction);
        }

    public function markAsPending()
    {
        $this->transaction->update(['status' => 'pending']);
    }

    public function markAsSuccess()
    {
        $this->transaction->update(['status' => 'success']);
    }

}; ?>

<div>
    <flux:heading size="lg">{{ ucfirst($transaction->user->name) }} - Deposits</flux:heading>

     <!-- Your Investments -->
     <div class="mt-8">
        <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-text">Investment</h3>

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
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                    {{ $transaction->created_at->format('M d, Y')  }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                    @if ($transaction->status === 'pending')
                                        <flux:button wire:click="markAsSuccess" variant="danger">Mark as Success</flux:button>
                                    @else
                                        <flux:button wire:click="markAsPending" variant="filled">Mark as Pending</flux:button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="px-6 mb-4 py-4 border-b border-gray-700">
                    <h3 class="text-lg font-medium text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Payment Proof
                    </h3>
                </div>
                <div class="p-6">
                    <div class="w-full flex justify-center">
                        <div class="relative w-full max-w-3xl overflow-hidden  rounded-lg">
                            <!-- Image wrapper with responsive aspect ratio -->
                            <div class="aspect-w-16 aspect-h-9 sm:aspect-w-4 sm:aspect-h-3">
                                <img 
                                    src="{{ Storage::url($transaction->proof_file_path) }}" 
                                    alt="Payment Proof" 
                                    class="object-contain w-full h-full transition-all duration-300 hover:scale-105"
                                    x-data="{}"
                                    @click="window.open('{{ Storage::url($transaction->proof_file_path) }}', '_blank')"
                                >
                            </div>
                            
                            <!-- Overlay with zoom icon -->
                            <div class="absolute inset-0 flex items-center justify-center  bg-opacity-0 hover:bg-opacity-40 transition-opacity duration-300 cursor-pointer"
                                 x-data="{}"
                                 @click="window.open('{{ Storage::url($transaction->proof_file_path) }}', '_blank')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white opacity-0 hover:opacity-100 transition-opacity duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
        </div>
    </div>
</div>
