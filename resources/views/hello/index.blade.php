<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>hello </title>
    </head>
    <body>
      <h2>{{$msg}}</h2>
      @if ( $msg == 'お名前を入力してください' )
      msg is empty
      @else
      msg is sent
      @endif
      </section>
      <form method="POST" action='/'>
        {{ csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
      </form>
    </body>
</html>
