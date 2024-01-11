<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>single Post</title>
</head>
<body>
    <h1 class="ml-20 mt-5 mb-5 text-3xl font-bold"> {{$post['title']}} </h1>
    <h3 class="ml-20 mt-5 mb-5 text-xl">by: {{$user['name']}}</h3>
    <br>
    <hr>
    <p class="ml-20 mt-5 mb-5 text-lg">{{$post['body']}}</p>
    <br><br>
    <hr>
    <br><br>

    <p class="ml-20 mt-5 mb-5">Last update: {{$post['created_at']}}</p>
    <br><br>

    @if ($authuser == $user['id'])
    <div class="flex ml-20 mt-5 mb-5 gap-3">        
    <a href="/editpost/{{$post['id']}}" class="w-20 text-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Edit</a>
    
    <form action="/deletepost/{{$post['id']}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-300">Delete</button>
    </form>
    </div>
    @endif
</body>
</html>