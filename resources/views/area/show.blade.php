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
        <select name="area" onchange='this.form.submit();'>
          @forelse ($areas as $code => $pref)
            <option value="{{ $code }}"
              @if($code == $selectedArea)
                SELECTED
              @endif
            >{{ $pref}}</li>
          @empty
            <option>選択してください</option>
          @endforelse
        </select>
        <select name="city">
          @forelse ($cities as $city)
            <option value="{{ $city['id'] }}"
            @if($selectedCity == $city['id'])
              SELECTED
            @endif
            >{{ $city['name'] }}</li>
          @empty
            <option>選択してください</option>
          @endforelse
        </select>
        <br/>
        <select name="startDate">
          @forelse ($period as $p)
            <option value="{{ $p }}"
            @if($startDate == $p)
              SELECTED
            @endif
            >{{ $p }}</li>
          @empty
            <option>選択してください</option>
          @endforelse
        </select>
        <select name="endDate">
          @forelse ($period as $p)
            <option value="{{ $p }}"
            @if($endDate == $p)
              SELECTED
            @endif
            >{{ $p }}</li>
          @empty
            <option>選択してください</option>
          @endforelse
        </select>
        <input type="submit">
      </form>
      @if (count($list) > 0)
        <table border="1">
          @foreach($list as $land)
          <tr>
            <td>{{ $land->period }}</td>
            <td>{{ $land->type }}</td>
            <td>{{ $land->buildingYear }}</td>
            <td>{{ $land->tradePrice }}</td>
            <td>{{ $land->area }}</td>
          </tr>
          @endforeach
        </table>
      @endif
    </body>
</html>
