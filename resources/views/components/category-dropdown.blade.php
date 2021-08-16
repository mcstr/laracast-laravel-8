  <x-dropdown>
                <x-slot name="trigger">
                    <button
                        class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
                    >
                        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                        <x-down-arrow />
                    </button>
                </x-slot>
                <x-dropdown-item href="/">
                    All
                </x-dropdown-item>

                @foreach ($categories as $category)
                {{-- {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : ''}}"
                 --}}
                    <x-dropdown-item
                        href="/?category={{ $category->slug }}"
                        :active="isset($currentCategory) && $currentCategory->is($category)"
                        {{-- we could also set the condition for the active using the request()->is('category->slug') this will check if that part is present in the url--}}
                    >
                        {{ ucwords($category->name)}}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>