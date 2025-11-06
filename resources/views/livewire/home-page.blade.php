{{-- صفحة الرسائل --}}
<div class="min-h-screen flex flex-col bg-gray-900 text-white">
    <div class="flex-1 flex justify-center items-center p-4">
        <div class="w-full max-w-2xl relative">
            {{-- Flash Message --}}
            @if ($successMessage)
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                    class="mb-4 px-6 py-4 rounded-2xl text-green-100 bg-green-600/90 text-center font-semibold shadow-lg transition-all">
                    {{ $successMessage }}
                </div>
            @endif

            @error('message')
                <div x-data="{ show: true }"
                     x-show="show"
                     x-init="setTimeout(() => show = false, 3000)"
                     x-on:show-error.window="show = true; setTimeout(() => show = false, 3000)"
                     class="mb-4 px-6 py-4 rounded-2xl text-red-100 bg-red-600/90 text-center font-semibold shadow-lg transition-all">
                    <p>{{ $message }}</p>
                </div>
            @enderror

            <div class="bg-gray-800/90 backdrop-blur-md rounded-3xl shadow-lg p-8 md:p-12">
                <div class="text-center mb-8">
                    <h1 class="text-3xl md:text-4xl font-bold text-red-500 mb-3">رسالة مجهولة</h1>
                    <p class="text-gray-300 text-lg">قول اللي في قلبك براحتك مش هنزلها استوري</p>
                </div>

                <div class="space-y-4">
                    <textarea placeholder="اكتب رسالتك هنا... متقلقش مش هعرف مين انت 😁"
                        class="w-full border-2 border-gray-700 rounded-2xl p-4 bg-gray-900 text-white focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all resize-none h-40 text-lg"
                        wire:model="message"></textarea>

                    <button wire:click="sendMessage"
                        class="w-full bg-gradient-to-r cursor-pointer from-red-500 to-blue-500 text-white px-6 py-4 rounded-2xl font-semibold text-lg hover:scale-105 transition-transform">
                        ابعت
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-gray-400 text-sm">بامانة تاني ما هعرف مين انت</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800/90 backdrop-blur-md text-white py-6 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p class="text-lg font-semibold mb-2 text-red-500">المقاول مينا إيهاب</p>
            <p class="text-gray-400 text-sm">جميع الحقوق محفوظة © 2025</p>
        </div>
    </footer>
</div>
