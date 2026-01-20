<x-layouts::app :title="__('Edit Article')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 p-4">
        <div class="relative h-full flex-1 rounded-xl border p-6">
            <h1>Edit Article</h1>
            
            <br>

            <form action="{{ route('articles.update', $article) }}" method="POST" class="grid gap-6 max-w-xl">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="title" class="block mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" 
                        class="w-full rounded-lg p-2.5 border {{ $errors->has('title') ? 'border-red-500' : '' }}">
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="url" class="block mb-2">URL</label>
                    <input type="text" name="url" id="url" value="{{ old('url', $article->url) }}" 
                        class="w-full rounded-lg p-2.5 border {{ $errors->has('url') ? 'border-red-500' : '' }}">
                    @error('url')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 mt-2">
                    <button type="submit" class="bg-white text-black px-4 py-2 rounded font-bold cursor-pointer">
                        Update Article
                    </button>
                    <a href="{{ route('home') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>