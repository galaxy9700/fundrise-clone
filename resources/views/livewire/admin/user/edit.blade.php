<?php

use App\Models\User;
use App\Models\Transaction;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('components.layouts.admin')] class extends Component {
    public $user = '';
    public $amount = '';
    public $transaction_type = '';

    protected $rules = [
        'amount' => 'required',
        'transaction_type' => 'required',
    ];

    public function addInterest()
    {
        $this->validate();

        Transaction::create([
            'user_id' => $this->user->id,
            'amount' => $this->amount,
            'transaction_type' => $this->transaction_type,
            'status' => 'success',
            'reference' => 'INV' . Str::random(8),
        ]);

        // Flash success message
        session()->flash('message', 'Transaction Added Succesfully.');
        session()->flash('message-type', 'success');
        $this->amount = '';

        // Auto-clear notification after 3 seconds
        $this->dispatch('clearNotificationAfterDelay');
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function with(): array
    {
        return [
            'totalDeposit' => Transaction::where('user_id', $this->user->id)->where('transaction_type', 'deposit')->where('status', 'success')->sum('amount'),
            'totalProfit' => Transaction::where('user_id', $this->user->id)->where('transaction_type', '!=', 'withdrawal')->where('status', 'success')->sum('amount'),
        ];
    }
}; ?>

<div>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Flash Message -->
        @if (session()->has('message'))
            <div id="flash-message"
                class="mb-4 p-4 rounded-md {{ session('message-type') === 'error' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-green-100 text-green-700 border border-green-200' }}">
                {{ session('message') }}
            </div>
            <script>
                // Auto-hide flash message after 3 seconds
                setTimeout(() => {
                    const flashMessage = document.getElementById('flash-message');
                    if (flashMessage) {
                        flashMessage.style.transition = 'opacity 0.5s ease';
                        flashMessage.style.opacity = '0';
                        setTimeout(() => {
                            flashMessage.remove();
                        }, 500);
                    }
                }, 3000);
            </script>
        @endif

        <flux:heading size="lg">{{ ucfirst($user->name) }} - User</flux:heading>

        {{-- grid column --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <!-- Total Users Card -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-900 bg-opacity-50 text-blue-400">
                            <!-- User Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>

                        </div>
                        <div class="ml-5">
                            <h4 class="text-2xl font-semibold text-white">
                                ${{ number_format($totalProfit, 2) }}
                            </h4>
                            <div class="flex items-center">
                                <span class="text-gray-400">Total Profit</span>
                                <span class="ml-2 flex items-center text-green-400"></span>
                            </div>
                        </div>
                    </div>
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
                                ${{ number_format($totalDeposit, 2) }}
                            </h4>
                            <div class="flex items-center">
                                <span class="text-gray-400">Total Deposits</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <flux:heading size="xl" class="mb-6">Add Interest</flux:heading>

        <form wire:submit="addInterest" class="max-w-xl">
            <div class="mb-6">
                <flux:input wire:model="amount" type="number" label="Amount" />
            </div>
            <div class="mb-6">
                <flux:select wire:model="transaction_type" :label="__('Select Transaction Type?')" required
                    placeholder="Interest Goal...">
                    <flux:select.option>interest</flux:select.option>
                    <flux:select.option>percentage</flux:select.option>
                </flux:select>
            </div>
            <div>
                <flux:button type="submit" variant="primary" class="ms-2 rtl:me-2">
                    {{ __('Add Interest') }}
                </flux:button>
            </div>
        </form>

    </div>

</div>
