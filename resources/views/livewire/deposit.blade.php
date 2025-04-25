<?php

use Livewire\Livewire;
use App\Models\Deposit;
use App\Models\Transaction;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

new #[Title('Deposit')] class extends Component {
    use WithFileUploads;

    public $amount = '';
    public $paymentMethod = '';
    public $btcAddress = 'bc1qkfx5zkum5jrxfx384utsxthxw4ts9xmeqkc6jl'; // Example BTC address
    public $showQrCode = false;
    public $showBankTransferMessage = false;
    public $paymentProof;
    public $transactionId = '';
    public $notification = null;

    protected $rules = [
        'amount' => 'required|numeric|min:1',
        'paymentMethod' => 'required|in:btc,bank',
        'paymentProof' => 'required|image|max:2048', // Max 2MB
        'transactionId' => 'nullable|string|max:255',
    ];

    public function selectPaymentMethod($method)
    {
        $this->paymentMethod = $method;

        if ($method === 'btc') {
            $this->showQrCode = true;
            $this->showBankTransferMessage = false;
        } elseif ($method === 'bank') {
            $this->showQrCode = false;
            $this->showBankTransferMessage = true;
        }
    }

    public function submitDeposit()
    {
        $this->validate();

        try {
            // Store the file
            $path = $this->paymentProof->store('payment_proofs', 'public');

            // Create deposit record
            Deposit::create([
                'user_id' => auth()->id(),
                'amount' => $this->amount,
                'payment_method' => $this->paymentMethod,
                'transaction_id' => $this->transactionId,
                'proof_file_path' => $path,
                'status' => 'pending', // Default status
            ]);

            // Create the transaction record
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'amount' => $this->amount,
                'transaction_type' => 'deposit',
                'payment_method' => $this->paymentMethod,
                'proof_file_path' => $path,
                'status' => 'pending',
                'reference' => 'INV' . Str::random(8),
            ]);

            // Reset form
            $this->reset(['amount', 'paymentProof', 'transactionId']);
            $this->paymentMethod = '';

            // Flash success message
            session()->flash('message', 'Deposit submitted successfully! Our team will review it shortly.');
            session()->flash('message-type', 'success');

            // Auto-clear notification after 3 seconds
            $this->dispatch('clearNotificationAfterDelay');
        } catch (\Exception $e) {
            // Flash error message
            session()->flash('message', 'Failed to submit deposit: ' . $e->getMessage());
            session()->flash('message-type', 'error');
            
            // Auto-clear notification after 3 seconds
            $this->dispatch('clearNotificationAfterDelay');
        }
    }
}; ?>

<div>
    <div class="mx-auto max-w-xl p-6 bg-darker rounded-lg shadow-md" x-data="{ isProcessing: false }">

        <!-- Flash Message -->
        @if (session()->has('message'))
            <div id="flash-message" class="mb-4 p-4 rounded-md {{ session('message-type') === 'error' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-green-100 text-green-700 border border-green-200' }}">
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
        
        <flux:heading size="xl" class="mb-6">Deposit Funds</flux:heading>

        <flux:text class="mt-2 mb-4">
            Ready to fund your journey? Make a deposit with ease—choose BTC for instant crypto transfers or reach out for bank transfer options. Your adventure starts here!
        </flux:text>

        <form wire:submit.prevent="submitDeposit">

            <div class="mb-6">
                <flux:input wire:model="amount" type="number" label="Amount" />
            </div>

            <div class="mb-6">
                <flux:text variant="subtle" class="mb-2">Select Payment Method.</flux:text>
                <div class="flex space-x-4">
                    <button wire:click="selectPaymentMethod('btc')"
                        class="flex-1 py-2 px-4 rounded-md {{ $paymentMethod === 'btc' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        Bitcoin
                    </button>

                    <button wire:click="selectPaymentMethod('bank')"
                        class="flex-1 py-2 px-4 rounded-md {{ $paymentMethod === 'bank' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        Bank Transfer
                    </button>
                </div>
            </div>

            @if ($paymentMethod === 'btc' && $amount > 0)
                <div class="p-4 bg-dark rounded-lg border border-gray-200">
                    <div class="text-center mb-3">
                        <flux:heading size="lg">Bitcoin Payment</flux:heading>
                        <flux:text variant="subtle">Send exactly {{ $amount }} to the address below</flux:text>
                    </div>

                    <div class="flex flex-col items-center">
                        <!-- QR Code -->
                        <div class="mb-4 bg-white p-2 rounded-lg">
                            <div id="qrcode" class="mx-auto w-48 h-48 flex items-center justify-center">
                                <!-- Using a simple placeholder, in production you would generate a real QR code -->
                                <img src="{{ asset('images/hecules_hexx.jpeg') }}" alt="Bitcoin QR Code"
                                    class="max-w-full">
                            </div>
                        </div>

                        <!-- Bitcoin Address -->
                        <div class="w-full">
                            <div class="flex items-center justify-between p-2 bg-darker rounded mb-2">
                                <span class="text-sm font-mono break-all">{{ $btcAddress }}</span>
                                <button
                                    @click="navigator.clipboard.writeText('{{ $btcAddress }}'); $dispatch('notice', {type: 'success', text: 'Address copied!'})"
                                    class="ml-2 p-1 text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                                        <path
                                            d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-xs text-gray-500 text-center">
                                Transaction may take up to 30 minutes to confirm after sending.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Transaction ID field for BTC payments -->
                <div class="my-6">
                    <flux:input wire:model="transactionId" type="number" label="Transaction Id" 
                        placeholder="Enter your BTC transaction ID (optional)" 
                    />
                    
                </div>
            @elseif($paymentMethod === 'bank')
                <div class="p-4 bg-amber-50 border border-amber-200 rounded-lg">
                    <div class="flex items-start">
                        <div class="text-amber-500 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-medium text-amber-800">Bank Transfer Not Available Online</h3>
                            <p class="text-sm text-amber-700 mt-1">
                                Please contact our support team at support@example.com or call +1 (555) 123-4567 to
                                arrange a bank transfer for your deposit.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($paymentMethod && $amount <= 0)
                <div class="p-3 bg-red-50 border border-red-200 rounded-lg mt-4">
                    <p class="text-sm text-red-600">Please enter a valid amount greater than 0.</p>
                </div>
            @endif

            @if ($paymentMethod && $paymentMethod === 'btc')
                <!-- Payment Proof Upload -->
                <div class="mb-6">
                    <label for="paymentProof" class="block text-sm font-medium text-gray-700 mb-1">Upload Payment
                        Proof</label>
                    <div
                            x-data="{ uploading: false, progress: 0 }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                        <div class="mt-1">
                            <label
                                class="w-full flex flex-col items-center px-4 py-6 bg-white rounded-md border border-gray-300 cursor-pointer hover:bg-gray-50">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <span class="mt-2 text-sm text-gray-600">
                                    @if ($paymentProof)
                                        File selected: {{ $paymentProof->getClientOriginalName() }}
                                    @else
                                        Upload a screenshot of your payment
                                    @endif
                                </span>
                                <input wire:model="paymentProof" id="paymentProof" type="file" class="hidden"
                                    accept="image/*">
                            </label>

                            <!-- Progress Bar -->
                            <div class="w-full" x-show="uploading">
                               <progress max="100" x-bind:value="progress"></progress>
                            </div>

                            <div x-show="uploading" class="mt-3">
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" :style="`width: ${progress}%`"></div>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Uploading... <span x-text="progress"></span>%</p>
                            </div>
                            @error('paymentProof') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    @if ($paymentProof)
                        <div class="mt-2">
                            <div class="relative w-full h-32 bg-gray-100 rounded-md overflow-hidden">
                                <img src="{{ $paymentProof->temporaryUrl() }}" alt="Payment proof preview"
                                    class="w-full h-full object-contain">
                                <button type="button" wire:click="$set('paymentProof', null)"
                                    class="absolute top-2 right-2 p-1 bg-red-500 rounded-full text-white hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-white text-black py-2 px-4 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-dark focus:ring-offset-2"
                        wire:loading.attr="disabled" x-bind:disabled="isProcessing">
                        <span wire:loading.remove wire:target="submitDeposit">Submit Deposit</span>
                        <span wire:loading wire:target="submitDeposit">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-dark inline-block"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>
