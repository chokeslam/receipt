@extends('layouts.app')

@section('content')
	<div class="container">

		<div>
			<table class="table table-sm table-hover table-fixed" style="text-align: center;">
        <thead>
            <tr class="d-flex">
                <th class="col-2">收據</th>
                <th class="col-1">使用者</th>
                <th class="col-8">單號</th>
                <th class="col-1">操作</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($ViewData as $value)
        	<tr class="d-flex">
        		<td class="col-sm-2" >{{$value['Name']}}</td>
        		<td class="col-sm-1" >{{$value['User']}}</td>
        		<td class="col-sm-8" style="text-align: left;">
                @foreach ($value['Numbers'] as $val)
                    <div class="form-check form-check-inline">
                        <input class="check" type="checkbox" value="{{$val}}">{{$val}}
                    </div>
                @endforeach
                </td>
                <td class="col-1">
                    <div style="margin-top:35px; ">
                        <a href="#">確認繳回</a><br>
                        <a href="{{url('index/'.$value['Name'])}}">關閉收據</a>
                    </div>
                </td>
            </tr>
        	@endforeach
        </tbody>
    </table>
		</div>
	</div>
@endsection