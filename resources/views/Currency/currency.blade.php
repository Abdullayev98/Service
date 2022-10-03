@extends('layouts.layout')
@section('content')
<body>
  <div class="table-data">
    <table class="table table-bordered m-2 border">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col">Birligi</th>
            <th scope="col">Somga nis-n qiymati</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr @if ($item['Ccy'] == "USD" || $item['Ccy'] == "RUB")
              class="border border-3 border-primary"
            @endif>
                <th scope="row">{{$item['id']}}</th>
                <td>{{$item['Code']}}</td>
                <td>{{$item['Ccy']}}</td>
                <td>{{$item['Rate']}}</td>
                <td>{{date('Y-m-d H:i:s');}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  

</body>
@endsection