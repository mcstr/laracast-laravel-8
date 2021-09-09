@auth
    <x-panel>

        <form action="/posts/{{ $post->slug }}/comments" method="post" class="border border-gray-200 p-6 rounded-xl">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                    class="rounded-full">


                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-6">
                <textarea name="body" class="w-full focus:outline-none focus:ring" rows="5"
                    placeholder="Quick! Think of something intelligent to say" required></textarea>
            </div>
            @error('body')
                <span class="text-red-400 text-xs">{{ $message }}</span>
            @enderror

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button class="bg-blue-500 uppercase font-semibold py-2 px-10 rounded-2xl hover:bg-blue-600 text-white"
                    type="submit">Post</button>
            </div>


        </form>
    </x-panel>
@else
    <p class="text-center w-full">
        <a href="/login" class="text-blue-500 hover:underline">Log in to participate</a>
    </p>
@endauth
