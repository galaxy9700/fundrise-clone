<!-- Add this to your layout file or to the deposit component view -->
<div x-data="{ 
    notices: [],
    addNotice(notice) {
        const id = Date.now();
        notice.id = id;
        this.notices.push(notice);
        
        // Auto remove after timeout
        setTimeout(() => {
            this.removeNotice(id);
        }, 3000);
    },
    removeNotice(id) {
        this.notices = this.notices.filter(notice => notice.id !== id);
    }
}" 
    @notice.window="addNotice($event.detail)"
    class="fixed top-4 right-4 z-50 space-y-2">

    <!-- Render each notice -->
    <template x-for="notice in notices" :key="notice.id">
        <div x-show="true" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-8"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-8"
             class="flex items-center p-3 rounded-lg shadow-lg"
             :class="{
                'bg-green-500 text-white': notice.type === 'success',
                'bg-red-500 text-white': notice.type === 'error',
                'bg-blue-500 text-white': notice.type === 'info',
                'bg-yellow-500 text-white': notice.type === 'warning'
             }">
            
            <!-- Success Icon -->
            <template x-if="notice.type === 'success'">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </template>
            
            <!-- Error Icon -->
            <template x-if="notice.type === 'error'">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </template>
            
            <!-- Info Icon -->
            <template x-if="notice.type === 'info'">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </template>
            
            <!-- Warning Icon -->
            <template x-if="notice.type === 'warning'">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </template>
            
            <span x-text="notice.text"></span>
            
            <button @click="removeNotice(notice.id)" class="ml-3 text-white hover:text-gray-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </template>
</div>