@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-sm table-hover table-fixed" id='tables' style="text-align: center;">
			<thead>
				<tr>
					<th>單號</th>
					<th>使用者</th>
					<th>繳回日期</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($query as $value)
				<tr>
					
					<td>{{$value->Numbers}}</td>
					<td>{{$value->User}}</td>
					<td>{{$value->End_time}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="col-md-12" style="text-align: center;">
			<a class="btn btn-link" role="btn" href="{{url('index')}}">回首頁</a>
		</div>
	</div>
@endsection