<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    @auth
    <p>Congrats you are logged in </p>
    <form action="/logout" method="POST">
        @csrf
        <button>LOG OUT</button>
    </form>

    <div style="border: 3px solid black;">
        <h2>Create New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title">
            <textarea name="body"></textarea>
            <button>Save Post</button>
        </form>
    <div>
 
        <div style="border: 3px solid black;">
            <h2>My Posts</h2>
            @foreach($posts as $post)
                <div style="background-colour:gray; padding:10px; margin:10px;">
                    <h3>{{$post['title']}} By {{$post->user->name}}</h3>
                    {{$post['body']}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>DELETE</button>
                    </form>
                </div>
        @endforeach
        <div>

    @else
    <div style="border: 3px solid black;">
        <h2>Register Form</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>REGISTER</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login Form</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>LOGIN</button>
        </form>
    </div>    
    @endauth
       
</body>
</html>