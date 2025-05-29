<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
    <div class="form-container" style="border: 3px solid black;">
    <h2>Create a new post</h2>
    <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title of the post" required>

        <textarea name="content" placeholder="What are you thinking..." required></textarea>

        <button type="submit">Post</button>
    </form>
</div>
<div class="form-container" style="border: 3px solid black;">
    <h2>all posts</h2>
   @foreach ($posts as $post)
    <div style="background-color: gray; padding: 10px; margin: 10px;">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <small>Posted on {{ $post->created_at->format('F j, Y') }}</small>
        <p><a href="/edit-post/{{$post->id}}">edit</a></p>
        <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>


    </div>
@endforeach
</div>


    @else
    <div class="form-container" style="border: 3px solid black;">
        <h2>Register</h2>

        <form action="/Register" method="POST" >
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">email:</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
     <div class="form-container" style="border: 3px solid black;">
        <h2>login</h2>

        <form action="/login" method="POST" >
            @csrf
            <label for="email">email:</label>
            <input type="text" id="email" name="logemail" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="logpassword" required>
            <button type="submit">login</button>
        </form>
    </div>

    @endauth

</body>
</html>
