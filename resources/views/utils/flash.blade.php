@if(session('success'))
<div class="w-full bg-green-600 mt-4 text-white alert">
    <div class="container mx-auto px-8 py-3 text-center">
        {{ session('success') }}
    </div>
</div>
@endif
@if(session('error'))
<div class="w-full mt-4 bg-red-600 text-white alert">
    <div class="container mx-auto px-8 py-3 text-center">
        {{ session('error') }}
    </div>
</div>
@endif
@if(session('info'))
<div class="w-full mt-4 bg-blue-600 text-white alert">
    <div class="container mx-auto px-8 py-3 text-center">
        {{ session('info') }}
    </div>
</div>
@endif