<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
</head>
<body>
    @auth
    <p>Congrats you are logged in Now</p>
    <form action="/logout" method="POST">
    @csrf
    <button>LogOut</button>
    </form>
    <div style="border:3px solid black">
        <h2>Create a new Post</h2>
        <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <textarea name="body" placeholder="body content..."></textarea>
        <button>Save Post</button>
    </form>
    </div>
    @else
    <div style="border:3px solid black">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="email" type="text" placeholder="Email">
            <input name="password" type="password" placeholder="Password">
            <button>Register</button>
        </form>
       </div>
    <div style="border:3px solid black">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="Name">
            <input name="loginpassword" type="password" placeholder="Password">
            <button>Login</button>
        </form>
       </div>
    @endauth   
 
</body>
</html>