@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card col-sm-12">
				<div class="card-body">
					<form action="{{ route('PerformanceSearch') }}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group row">
							<label class="col-sm-1 col-form-label text-md-right">{{ __('選擇日期:') }}</label>
							<div class="col-sm-2"> 
								<input class="form-control date filter" name="Start" type="text" value="{{old('Start')}}" placeholder="起始日期" maxlength="10">
							</div>
							<div>
							~
							</div>
							<div class="col-sm-2"> 
								<input class="form-control date filter" name="End" type="text" value="{{old('End')}}" placeholder="結束日期" maxlength="10">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-1 col-form-label text-md-right">{{ __('選擇地區:') }}</label>
							<div class="col-sm-2"> 
								<select class="form-control filter" name="Place">
									<option value="">{{ __('選擇地區') }}</option>
									@if (old('Place') == 'B')
										<option value="B" selected="selected">台北</option>
									@else
										<option value="B">台北</option>
									@endif
									@if (old('Place') == 'C')
										<option value="C"  selected="selected">中壢</option>
									@else
										<option value="C">中壢</option>
									@endif
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-1 col-form-label text-md-right">{{ __('選擇日期:') }}</label>
							<div class="col-sm-2"> 
								<select class="form-control filter" name="Name">
									<option value="">{{ __('選擇業務') }}</option>
								@foreach ($sales as $value)
									@if (old('Name') == $value->Name)
										<option value="{{$value->Name}}" selected="selected">{{$value->Name}}</option>
									@else
										<option value="{{$value->Name}}">{{$value->Name}}</option>
									@endif
									
								@endforeach
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>

			@if ($result)
			<div class="col-sm-12" style="padding: 0; margin-top: 20px;">
				<table class="table table-bordered table-sm table-hover table-fixed col-sm-12" style="text-align: center;">
					<thead>
						<tr class="bg-dark text-light">
							<th>日期</th>
							<th colspan="6">報名</th>
							<th colspan="6">繳清</th>
						</tr>
						<tr>
							<th></th>
							<th>轉學</th>
							<th>金額</th>
							<th>工研</th>
							<th>金額</th>
							<th>商研</th>
							<th>金額</th>
							<th>轉學</th>
							<th>金額</th>
							<th>工研</th>
							<th>金額</th>
							<th>商研</th>
							<th>金額</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($result as $element)
						<tr class="table-light">
							<td>{{$element[0]}}</td>
							<td>{{$element[1]}}</td>
						@if ($element[2]!=0)
							<td>{{$element[2]}}</td>
						@else
							<td></td>
						@endif
							
							<td>{{$element[3]}}</td>
							<td>{{$element[4]}}</td>
							<td>{{$element[5]}}</td>
							<td>{{$element[6]}}</td>
							<td>{{$element[7]}}</td>
							<td>{{$element[8]}}</td>
							<td>{{$element[9]}}</td>
							<td>{{$element[10]}}</td>
							<td>{{$element[11]}}</td>
							<td>{{$element[12]}}</td>
						</tr>
						<tr class="table-default">
							<td>合計</td>
							<td colspan="12">{{$element[2]+$element[4]+$element[6]+$element[8]+$element[10]+$element[12]}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>	
			</div>
			@endif
		</div>
	</div>
@endsection

@section('js')
	 @parent
		<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}" defer></script>
        <script src="{{ asset('js/Performance_Table.js') }}" defer></script>
@endsection