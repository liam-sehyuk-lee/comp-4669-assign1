<x-layouts::app :title="$article->title">
    <div class="flex h-full w-full flex-1 flex-col gap-4 p-4">
        @if (session('success'))
            <div class="text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <a href="{{ route('home') }}">
                ← Back to Articles
            </a>
        </div>

        <div class="rounded-xl border p-8">    
            <h1>{{ $article->title }}</h1>

            <br>

            <div>
                <span>{{ $article->user->name }}</span>
                <span>•</span>
                <span>{{ $article->created_at->format('Y-m-d H:i') }}</span>
            </div>

            <hr>

            <a href="{{ $article->url }}" target="_blank">
                {{ $article->url }}
            </a>

            @if(auth()->id() === $article->user_id)
                <br><br>
                <div class="flex gap-4">
                    <a href="{{ route('articles.edit', $article) }}">
                        Edit Article
                    </a>

                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 cursor-pointer">
                            Delete Article
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-layouts::app>