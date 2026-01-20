<!DOCTYPE html>
<html>
<head>
    <title>Submit Article</title>
</head>
<body>
    <h1>Submit a New Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>URL</label>
            <input type="text" name="url" value="{{ old('url') }}">
            @error('url')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit">Submit Article</button>
        <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
    </form>
</body>
</html>