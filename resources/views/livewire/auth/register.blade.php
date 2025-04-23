<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public $currentStep = 1;
    public $totalSteps = 4;

    // Step 1: Basic Info
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Step 2: Investment Profile
    public $investmentGoal = '';
    public $riskTolerance = '';
    public $investmentHorizon = '';

    // Step 3: Accreditation Status
    public $accreditedInvestor = false;
    public $annualIncome = '';
    public $netWorth = '';

    // Step 3: Accreditation Status
    public $terms = '';


    // protected $rules = [
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|string|email|max:255|unique:users',
    //     'password' => 'required|string|min:8|confirmed',
    //     'investmentGoal' => 'required|string',
    //     'riskTolerance' => 'required|string',
    //     'investmentHorizon' => 'required|string',
    //     'selectedPlanId' => 'required|string',
    //     'investmentAmount' => 'required|numeric|min:500',
    // ];

    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);
        } elseif ($this->currentStep === 2) {
            $this->validate([
                'investmentGoal' => 'required|string',
                'riskTolerance' => 'required|string',
                'investmentHorizon' => 'required|string',
            ]);
        } elseif ($this->currentStep ===3) {
            
        }

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $this->validate(['terms' => 'accepted']);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'investment_goal' => $this->investmentGoal,
            'risk_tolerance' => $this->riskTolerance,
            'investment_horizon' => $this->investmentHorizon,
            'accredited_investor' => $this->accreditedInvestor,
            'annual_income' => $this->annualIncome,
            'net_worth' => $this->netWorth,
        ]);

        event(new Registered(($user)));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Step 1: Basic Information -->
        @if ($currentStep === 1)
            <div class="flex flex-col gap-6">
                <x-auth-header :title="__('Basic Information')" :description="__('Please provide your basic information')" />
            </div>
            <!-- Name -->
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"
                :placeholder="__('Full name')" />

            <!-- Email Address -->
            <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
                placeholder="email@example.com" />

            <!-- Password -->
            <flux:input wire:model="password" :label="__('Password')" type="password" required
                autocomplete="new-password" :placeholder="__('Password')" />

            <!-- Confirm Password -->
            <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
                autocomplete="new-password" :placeholder="__('Confirm password')" />
        @endif

        <!-- Step 2: Investment Profile -->
        @if ($currentStep === 2)
            <div class="flex flex-col gap-6">
                <x-auth-header :title="__('Investment Profile')" :description="__('Please provide your investment profile')" />
            </div>
            <div class="flex flex-col gap-6">
                <flux:select wire:model="investmentGoal" :label="__('What is your primary investment goal?')" required
                    placeholder="Investment Goal...">
                    <flux:select.option>Long-term Growth</flux:select.option>
                    <flux:select.option>Steady Income</flux:select.option>
                    <flux:select.option>Capital Preservation</flux:select.option>
                    <flux:select.option>Portfolio Diversification</flux:select.option>
                </flux:select>
                <flux:select wire:model="riskTolerance" :label="__('What is your risk tolerance?')" required
                    placeholder="Risk Tolerance...">
                    <flux:select.option>Conservative</flux:select.option>
                    <flux:select.option>Moderate</flux:select.option>
                    <flux:select.option>Aggressive</flux:select.option>
                </flux:select>
                <flux:select wire:model="investmentHorizon" :label="__('What is your investment time horizon?')"
                    required placeholder="Time Horizon...">
                    <flux:select.option>Short term (< 3 years)</flux:select.option>
                    <flux:select.option>Medium term (3-7 years)</flux:select.option>
                    <flux:select.option>Long term (> 7 years)</flux:select.option>
                </flux:select>

            </div>
        @endif

        <!-- Step 3: Accreditation Status -->
        @if ($currentStep === 3)
            <div class="flex flex-col gap-6">
                <x-auth-header :title="__('Accreditation Status')" :description="__('Please provide your accreditation status')" />
            </div>
            <div class="flex flex-col gap-6">

                <flux:field variant="inline">
                    <flux:checkbox wire:model.live="accreditedInvestor" />

                    <flux:label>I am an accredited investor</flux:label>

                    <flux:error name="accreditedInvestor" />
                </flux:field>
                <div>
                    @if ($accreditedInvestor)
                        <div wire:transition class="space-y-4">
                            <flux:select wire:model="annualIncome" :label="__('Annual Income')" required
                                placeholder="Annual Income...">
                                <flux:select.option>Below $200k</flux:select.option>
                                <flux:select.option>$200k - $300k</flux:select.option>
                                <flux:select.option>Above $300k</flux:select.option>
                            </flux:select>
    
                            <flux:select wire:model="netWorth" :label="__('Net Worth')" required
                                placeholder="Net Worth...">
                                <flux:select.option>Below $1 million</flux:select.option>
                                <flux:select.option>$1 million - $5 million</flux:select.option>
                                <flux:select.option>Above $5 million</flux:select.option>
                            </flux:select>
                        </div>
                    @endif
                    <div class="mt-4">
                        <flux:text class="mt-2">An accredited investor is an individual with earned income exceeding
                            $200,000 ($300,000 with spouse) in each of the prior two years, or has a net worth over $1
                            million..</flux:text>
                    </div>
                </div>
            </div>
        @endif

        <!-- Step 6: Review and Confirm -->
        @if ($currentStep === 4)
            <div>
                <div class="flex flex-col gap-6">
                    <x-auth-header :title="__('Review and Confirm')" :description="__('Please review your information')" />
                    <flux:text class="mt-2">Please review your information before submitting.</flux:text>
                </div>

                <div class="mt-4 space-y-4">
                    <div class="border-b border-gray-700 pb-3">
                        <flux:heading class="text-xl">Personal Information</flux:heading>
                        <div class="mt-2 grid grid-cols-2 gap-2">
                            <div>
                               <flux:heading>Name</flux:heading>
                               <flux:text class="mt-2">{{ $name }}</flux:text>
                            </div>
                            <div>
                                <flux:heading>Email</flux:heading>
                                <flux:text class="mt-2">{{ $email }}</flux:text>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-700 pb-3">
                        <flux:heading class="text-xl">Investment Profile</flux:heading>
                        <div class="mt-2 grid grid-cols-2 gap-2">
                            <div>
                                <flux:heading>Goal</flux:heading>
                                <flux:text class="mt-2">{{ ucfirst($investmentGoal) }}</flux:text>
                            </div>
                            <div>
                                <flux:heading>Risk Tolerance</flux:heading>
                                <flux:text class="mt-2">{{ ucfirst($riskTolerance) }}</flux:text>
                            </div>
                            <div>
                                <flux:heading>Time Horizon</flux:heading>
                                <p class="text-sm text-x-text">
                                    @switch($investmentHorizon)
                                        @case('Short term (< 3 years)')
                                            <flux:text class="mt-2">Short term (< 3 years)</flux:text>
                                        @break 
                                        @case('Medium term (3-7 years)') 
                                            <flux:text class="mt-2">Medium term (3-7 years)</flux:text>
                                        @break 
                                        @case('Long term (> 7 years)') 
                                           <flux:text class="mt-2">Long term (> 7 years)</flux:text>
                                            @break
                                    @endswitch
                                </p>
                            </div>
                            <div>
                                <flux:heading>Accredited Investor</flux:heading>
                                <flux:text class="mt-2">{{ $accreditedInvestor ? 'Yes' : 'No' }}</flux:text>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="bg-x-dark border border-gray-700 rounded-lg p-3">
                            <flux:field variant="inline">
                                <flux:checkbox wire:model='terms' required />
                            
                                <flux:label>
                                    I agree to the <flux:link href="#" class="ml-1"> Terms of Service </flux:link> 
                                </flux:label>
                            
                                <flux:error name="terms" />
                            </flux:field>
                    </div>
                </div>
            </div>
        @endif
        <div class="flex items-center justify-end">
            @if ($currentStep > 1)
                <flux:button type="button" variant="primary" wire:click="previousStep">
                    {{ __('Back') }}
                </flux:button>
            @else
                <div></div>
            @endif
            @if ($currentStep < $totalSteps)
                <flux:button type="button" variant="primary" wire:click="nextStep" class="ms-2 rtl:me-2">
                    {{ __('Next') }}
                </flux:button>
            @else
                <flux:button type="submit" variant="primary" class="ms-2 rtl:me-2">
                    {{ __('Complete Registration') }}
                </flux:button>
            @endif
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
