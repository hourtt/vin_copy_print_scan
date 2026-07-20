<div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
    <h3 class="px-6 py-4 border-b border-gray-200 text-lg font-semibold text-gray-900 bg-gray-50/50">Primary Credentials</h3>
    <div class="px-6 py-5 border-b border-gray-100 last:border-0 flex flex-col md:flex-row md:items-center gap-4">
        <div class="md:w-1/3 text-sm font-medium text-gray-700">Email Address</div>
        <div class="flex-1 text-sm text-gray-900">{{ Auth::user()->email }}</div>
        <div class="md:text-right"><button class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors">Change</button></div>
    </div>
    <div class="px-6 py-5 border-b border-gray-100 last:border-0 flex flex-col md:flex-row md:items-center gap-4">
        <div class="md:w-1/3 text-sm font-medium text-gray-700">Password</div>
        <div class="flex-1 text-sm text-gray-900">********</div>
        <div class="md:text-right"><button class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors">Update</button></div>
    </div>
</div>
