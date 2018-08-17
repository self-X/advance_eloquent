EP1
composer require "laracasts/generators"                   - для быстрого создания таблиц\моделей
composer require "laracasts/testdummy" --dev              - в основном для тестов

php artisan make:migration:schema create_posts_table --schema="user_id:integer:foregin, title:string, body:text" //Creates Model and Migration 
php artisan make:seed PostsTableSeeder //create seed for posts table

EP2
>>> $post->newQuery()->find(20); //newQuery() - это КвериБилдер. до этого я просто создал новый Апп\пост объект.
=> App\Post {#2889
     id: 20,     user_id: 33,
     title: "Dignissimos et voluptates omnis accusantium.",
     body: "Autem aliquid tempore necessitatibus velit neque eligendi. Quam architecto possimus voluptatum quis aperiam sit. Adipisci voluptas voluptatum ipsam nulla quos repellendus
. Rerum eum molestiae magni minus. Dignissimos non optio voluptate ipsa.",
     created_at: "2018-08-17 10:30:43",
     updated_at: "2018-08-17 10:30:43",
   }
>>>
$post->newQuery()->where('id',20)->first(); - the same as previous 
newQuery ---> newEloquentBuilder($query) ---> reuturn new Builder($query)
EP3
 как работает find() ясно,но с where немного по другому
  Post::where() тема эпизода
Используются две магические функции __call __callStatic они автоматически "включаются" по какому-то условию 

class Foo {

    public static function bar() //$method - имя статического метода, //parameters - его параемтеры 
    {
        var_dump('exists');
    }
    
    public static function __callStatic($method, $parameters) //$method - имя статического метода, //parameters - его параемтеры 
    {
        var_dump('called');
    }
}

Foo::bar(); // not "called" but "exsists"  но если бы небыло функции бар - был бы called

Post::where - не найдено, по этому мы вызываем callStatic метод

 public static function __callStatic($method, $parameters) //$method - имя статического метода, //parameters - его параемтеры 
    {
        $instance = new static; //new Model
        return call_user_func_array($array($instatnce, $method), $parameters); //$method on new Model
        //for understanding: (new Model)->$method ==== (new Model Ъмы ж к модели обращаемся и знаем вид моделиЪ)->whereЪсам метод моделиЪ($parameters Ъсами параметрыЪ)
    }

    //тоже самое и с __call() для обычных регулярных методов суть та же

    еще кое шо:
    $column instanceof Closure 
    от этот Closure как-то связанна с замыканием внутри параметра обычной функции пример:
    Post::where(function($query){
        $query->where('bla-bla', 'bla');
    });

    //Post::where(['fafda'=> 'dsd, 'gfgd'=>'hhh'])->delete();
    //Post::where('fafda'=> 'dsd)->where('ba'=> 'by')->delete();
    EP4
    