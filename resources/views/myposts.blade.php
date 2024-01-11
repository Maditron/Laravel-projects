<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>My Posts</title>
</head>
<body>
    @auth
    <div class="flex mt-5 ml-20 gap-3">
    <a type="submit" href="/createpost" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Post</a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Logout</button>
        </form>
        <a type="submit" href="/home" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Home</a>
    </div>


    <h2 class="ml-20 mt-8 text-4xl font-extrabold dark:text-white">My Posts</h2>
    <div class="flex w-fit gap-4 m-20">
        @foreach ($posts as $post)
        <a href="/singlepost/{{$post->id}}" class="flex flex-col max-w-sm p-6 bg-slate-900 border border-gray-200 rounded-lg shadow-md hover:bg-gray-100">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5> <br>
          <p class="font-normal text-gray-700 dark:text-gray-400">{{ substr($post->body, 0, 100) }}...</p>
          <br>
          <p>Your Post</p>
        </a>
      
        @endforeach
      </div>

      @else
      <h2>you are not logged in</h2>

      @endauth
</body>
</html>