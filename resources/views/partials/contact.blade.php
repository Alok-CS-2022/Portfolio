<section id="contact" class="max-w-5xl mx-auto px-6 py-16">
    <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// Get In Touch</p>
    <h2 class="font-serif text-4xl md:text-5xl font-black mb-10">Contact</h2>

    <div class="border border-black p-6 md:p-8">

        @if(session('success'))
            <div class="mb-6 border border-[#8db800] text-[#5a7a00] font-mono text-sm px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 border border-red-600 text-red-600 font-mono text-sm px-4 py-3">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block font-mono text-xs uppercase tracking-widest mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-black px-3 py-2 font-mono text-sm bg-transparent focus:outline-none focus:border-[#8db800]"
                       required>
            </div>

            <div>
                <label for="email" class="block font-mono text-xs uppercase tracking-widest mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full border border-black px-3 py-2 font-mono text-sm bg-transparent focus:outline-none focus:border-[#8db800]"
                       required>
            </div>

            <div>
                <label for="message" class="block font-mono text-xs uppercase tracking-widest mb-1">Message</label>
                <textarea name="message" id="message" rows="5"
                          class="w-full border border-black px-3 py-2 font-mono text-sm bg-transparent focus:outline-none focus:border-[#8db800]"
                          required>{{ old('message') }}</textarea>
            </div>

            <button type="submit"
                    class="font-mono text-xs uppercase tracking-widest border border-black px-6 py-3 hover:bg-[#8db800] hover:border-[#8db800] hover:text-white transition-colors">
                Send Message →
            </button>
        </form>

    </div>
</section>
