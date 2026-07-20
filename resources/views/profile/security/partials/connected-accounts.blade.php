@php
    $githubAccount = Auth::user()->connectedAccounts()->where('provider_name', 'github')->first();
@endphp

<div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gray-50/50">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-1">Connected Accounts</h3>
            <p class="text-sm text-gray-500">Connect your social accounts to log in quickly without a password.</p>
        </div>
    </div>

    {{-- GitHub Connection --}}
    <div class="px-6 py-5 border-b border-gray-100 last:border-0 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-[#24292e] flex items-center justify-center text-white shrink-0">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg>
            </div>
            <div>
                <div class="font-medium text-gray-900">GitHub</div>
                <div class="text-sm text-gray-500">
                    @if($githubAccount)
                        Connected on {{ $githubAccount->created_at->format('M j, Y') }}
                    @else
                        Not connected
                    @endif
                </div>
            </div>
        </div>
        
        <div class="md:text-right">
            @if($githubAccount)
                <form action="{{ route('socialite.disconnect', 'github') }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 text-sm font-medium border border-red-300 rounded-md bg-white transition-colors text-red-600 hover:bg-red-50 hover:border-red-400 hover:text-red-700">Disconnect</button>
                </form>
            @else
                <a href="{{ route('socialite.redirect', 'github') }}" class="px-3 py-1.5 text-sm font-medium border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">Connect</a>
            @endif
        </div>
    </div>
</div>
