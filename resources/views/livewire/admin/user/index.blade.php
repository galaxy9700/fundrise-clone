<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new 
#[Layout('components.layouts.admin')] class extends Component {
    //
}; ?>

<div>   
    <flux:heading size="lg">Users</flux:heading>

    <div class="mt-8">
        <div class="bg-darker overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-text">Users</h3>

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
                                    Email</th>
                                
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">
                                    Date</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider sr-only">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach (App\Models\User::where('is_admin', 0)->get() as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                        {{ $user->created_at->format('M d, Y')  }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-text">
                                       <a href="{{ route('admin.user.edit', $user->id) }}"wire:navigate >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                                            </svg>                                    
                                       </a>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
