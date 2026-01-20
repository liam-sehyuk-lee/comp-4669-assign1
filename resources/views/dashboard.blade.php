<x-layouts::app :title="__('Articles')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 p-4">
        @if (session('success'))
            <div class="text-green-600">
                {{ session('success') }}
            </div>
        @endif
    
        @if ($errors->any())
            <div class="text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="relative h-full flex-1 rounded-xl border p-6">

            <div class="flex items-center justify-between mb-8">
                <h1>Articles</h1>

                @auth
                    <a href="{{ route('articles.create') }}" class="bg-white text-black px-4 py-2 rounded font-bold text-sm">
                        + Submit Article
                    </a>
                @endauth
            </div>

            <br>

            @if($articles->isEmpty())
                <div class="text-center py-20">
                    <h2>No articles yet</h2>
                    <p>Be the first to submit an article!</p>
                </div>
            @else
                <div class="grid gap-4">
                    @foreach($articles as $article)
                        <div class="rounded-xl border p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="mb-2">
                                        <a href="{{ route('articles.show', $article) }}">
                                            {{ $article->title }}
                                        </a>
                                    </h2>
                                    <div class="flex gap-2 text-sm mb-4">
                                        <span>{{ $article->user->name }}</span>
                                        <span>•</span>
                                        <span>{{ $article->created_at->diffForHumans() }}</span>
                                    </div>
                                    <a href="{{ $article->url }}" target="_blank" class="text-sm">
                                        {{ $article->url }}
                                    </a>
                                </div>
                                
                                @if(auth()->id() === $article->user_id)
                                    <a href="{{ route('articles.edit', $article) }}" class="text-sm">
                                        Edit
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            
        </div>
    </div>
</x-layouts::app>