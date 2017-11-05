<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Area</title>
    </head>
    <body>
      <h2>調べたい都道府県を選択して送信を押してください</h2>
      <form action="/city" method="POST">
        {{ csrf_field() }}
        <select name="area">
          @forelse ($areas as $code => $pref)
            <option value="{{ $code }}"
              @if($code == $area)
                SELECTED
              @endif
            >{{ $pref}}</li>
          @empty
            <option>選択してください</option>
          @endforelse
        </select>
        <select name="city">
          @forelse ($cities as $city)
            <option value="{{ $city['id'] }}">{{ $city['name'] }}</li>
          @empty
            <option>選択してください</option>
          @endforelse
        </select>
        <input type="submit">
      </form>
    </body>
</html>
