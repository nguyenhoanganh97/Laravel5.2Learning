<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

/**
 * route truyển tham số
 * $stickername có thể không có
 */
Route::get('type/{stickername?}', function ($stickername = 'null') {
    return "sticker tên " . $stickername;
})->where([
    'type' => '[a-z]+',
    'stickername' => '[a-zA-Z]{1,10}'
]);

Route::get('hello-world', function () { //gọi thẳng view
    $quantity = 5;
    return view('hello-world', compact('quantity'));
});

Route::group(['prefix' => 'sticker'], function () {
    Route::get('{stickerType}', function ($stickerType) {
        echo "$stickerType";
    });
});

Route::get('home', 'HomeController@loadHome');

Route::get('mystyle', function () {
    // return URL::asset(''); laravel 4
    return asset('public/template/css/mystyle.css', true);
});

Route::get('schema/dropProducts', function () {
    Schema::dropIfExists('products');
});
Route::get('schema/updateName', function () {
    Schema::table('Products', function ($table) {
        $table->string('name', 100)->change();
    });
});

Route::get('schema/createCategoriesTable', function () {
    Schema::create('categories', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});

Route::get('schema/createProductsTable', function () {
    Schema::create('products', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->mediumInteger('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('categories');
        $table->timestamps();
    });
});

Route::get('query/select-all', function () {
    $data = DB::table('products')->get();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});


Route::get('query/categories', function () {
    $data = DB::table('categories')
        ->get();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
Route::get('query/select-products', function () {
    $products = DB::table('products')
        ->join('categories', 'products.cate_id', '=', 'categories.id')
        ->select('categories.name as category', 'products.*')
        ->orderBy('products.id', 'desc')
        ->whereBetween('products.id', [36, 100])
        ->get();
    echo '<pre>';
    print_r($products);
    echo '</pre>';
});

Route::get('query/count', function () {
    $data = DB::table('products')
        ->count();
    echo ($data);
});

Route::get('model/products/all', function () {
    $products = App\Product::all()->toJson();
    echo '<pre>';
    print_r($products);
    echo '</pre>';
});

Route::get('php-version', function () {
    echo 'Current PHP version: ' . phpversion();
});

Route::get('relation/hasMany',function (){
    $data = App\Category::find(9)->products()->get()->tojSon();
    
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('relation/belongs',function (){
    $data = App\Product::find(65)->category()->get()->tojSon();
    
    echo '<pre>';
    print_r($data);
    echo '</pre>';
})
?>
