<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>hello </title>
    </head>
    <body>
      hello, first laravel template
      <h1>Blade/Index</h1>
      <h2>{{$msg}}</h2>
      <form method="POST" action='/'>
        {{ csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
      </form>
    </body>
</html>
