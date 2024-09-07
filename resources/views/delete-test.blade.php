<!-- resources/views/delete-test.blade.php -->
<html>
<head>
    <title>Delete Test</title>
</head>
<body>
    <h1>Test DELETE Request</h1>
    <form action="/test-delete/2" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Send DELETE Request</button>
    </form>
</body>
</html>
