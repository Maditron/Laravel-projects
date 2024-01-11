<?php



use App\Models\Post;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $posts = Post::all();
    if (is_null($posts)){
        abort(404);
    }
    return view('home', ['posts' => $posts]);
});


Route::post('/register',[userController::class, 'register']);
Route::post('/login',[userController::class, 'login']);
Route::post('/logout',[userController::class, 'logout']);

Route::get('/myposts',function (){
    $id = auth()->user()->id;
    $posts = Post::where('user_id', $id)->get();
    if (is_null($posts)){
        abort(404);
    }
    return view('myposts', ['posts' => $posts]);
});


Route::get('/createpost',function (){
    return view('createpost');
});

Route::post('/savepost',[postController::class, 'savepost']);

Route::get('/singlepost/{id}',[postController::class, 'show']);

Route::get('/editpost/{post}',[postController::class, 'showedit']);
Route::post('/editpost/{post}',[postController::class, 'edit']);
Route::delete('/deletepost/{post}',[postController::class, 'delete']);