<div class="space-y-3 mb-8">
    <template x-for="method in shippingMethods" :key="method.id">
        <label
            class="flex items-center justify-between p-4 border rounded-xl cursor-pointer transition-colors"
            :class="selectedMethodId == method.id ? 'border-[#3f3f46] bg-zinc-50' : 'border-[#e4e4e7] hover:border-[#3f3f46]'">
            <div class="flex items-center gap-4">
                <input type="radio" :value="method.id" x-model="selectedMethodId"
                    class="w-5 h-5 text-[#27272a] focus:ring-[#27272a]">
                <div>
                    <div class="font-medium text-[#27272a]" x-text="method.name"></div>
                    <div class="text-sm text-[#71717a]" x-text="method.description"></div>
                </div>
            </div>
            <div class="font-bold text-[#27272a]"
                x-text="parseFloat(method.fee) === 0 ? 'Free' : formatPrice(method.fee)"></div>
        </label>
    </template>
</div>
