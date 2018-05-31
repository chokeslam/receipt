
@extends('layouts.app')

@section('content')
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 row btn-group">
				<a class="btn btn-link" role="btn" href="#B">台北</a>
  				<a class="btn btn-link" role="btn" href="#C">中壢</a>
				
			</div>
			<div class="col-sm-12 fixed-bottom col align-self-end" style="text-align:right;">
				<a href="#app">
					<img src="{{ URL::asset('images/top.png')}}" width="60" height="60" alt="回到最上方" title="回到最上方">
				</a>
			</div>
			{{-- 總業績 Table --}}
			<table class="table table-bordered table-sm table-fixed col-sm-12" style="text-align: center;">
				<thead class="thead-light">
					<th>合計金額</th>
				</thead>
				<tbody>
					<tr class="text-success font-weight-bold">
						<td class="h3">{{$AllCalculation['Amount']}}</td>
					</tr>
				</tbody>
			</table>
			{{-- 地區業績 Table --}}
			@for ($i = 1; $i < 3; $i++)
				<table class="table table-bordered table-sm table-fixed col-sm-12" style="text-align: center;">
					<thead>
						<tr class="thead-light">
						@if ($i==1)
							<th colspan="12">台北</th>
						@else
							<th colspan="12">中壢</th>
						@endif
						</tr>
						<tr>
							<th colspan="6">報名</th>
							<th colspan="6">繳清</th>
						</tr>
						<tr>
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
						<tr>
						@foreach ($ClassifyCalculation as $key => $value)
							@if ($i==1)
								@if ($key<6)
									<td>{{$value['Person']}}</td>
									<td class="text-success font-weight-bold">{{$value['Amount']}}</td>
								@endif
							@else
								@if ($key>5)
									<td>{{$value['Person']}}</td>
									<td class="text-success font-weight-bold">{{$value['Amount']}}</td>
								@endif
							@endif
						@endforeach
						</tr>
					</tbody>
				</table>
			@endfor
		{{-- 表單區 --}}
		@for ($placerow = 1; $placerow < 3; $placerow++)
			
			@if ($placerow == 1)
			<div class="col-sm-6">
				<div id="B"></div>
				<h2>台北</h2>
			</div>

			@else
			<div class="col-sm-6">
				<div id="C"></div>
				<h2>中壢</h2>
				
			</div>
			@endif
			
			<div class="col-sm-12">
				<hr>
			</div>
			<div class="col-sm-6" style="text-align:center;">
				<h5>報名</h5>
			</div>
			<div class="col-sm-6 bg-light" style="text-align:center;">
				<h5>繳清</h5>
			</div>
			<div class="col-sm-12" id="text">
				
			</div>
			
				{{-- expr --}}
			
			<div class="col-sm-6 row" style="margin: 0;">
			@for ($inputrow = 1; $inputrow < 4; $inputrow++)

			@if ($placerow == 1)
				<input class="form-control  col-sm-2" type="hidden" name="Place" value="B">
			@else
				<input class="form-control  col-sm-2" type="hidden" name="Place" value="C">
			@endif
				<input class="form-control  col-sm-2" type="hidden" name="Class" value="{{$inputrow}}">
				<input class="form-control  col-sm-2" type="hidden" name="Status" value="1">

				<select class="form-control col-sm-2" name="Name" style="padding: 0;">
					<option value="">{{ __('選擇業務') }}</option>
				@foreach ($sales as $value)
					<option value="{{$value->Name}}">{{$value->Name}}</option>
				@endforeach
				</select>

				<input class="form-control  col-sm-2" type="text" name="Amount" value="" placeholder="">


			@endfor
			</div>
			<div class="col-sm-6 row" style="margin: 0;">
			@for ($inputrow = 1; $inputrow < 4; $inputrow++)

			@if ($placerow == 1)
				<input class="form-control  col-sm-2" type="hidden" name="Place" value="B">
			@else
				<input class="form-control  col-sm-2" type="hidden" name="Place" value="C">
			@endif
				<input class="form-control  col-sm-2" type="hidden" name="Class" value="{{$inputrow}}">
				<input class="form-control  col-sm-2" type="hidden" name="Status" value="2">

				<select class="form-control col-sm-2" name="Name" style="padding: 0;">
					<option value="">{{ __('選擇業務') }}</option>
				@foreach ($sales as $value)
					<option value="{{$value->Name}}">{{$value->Name}}</option>
				@endforeach
				</select>

				<input class="form-control  col-sm-2" type="text" name="Amount" value="" placeholder="">


			@endfor
			</div>
			
			<div class="col-sm-6 row" style="text-align:center; margin: 0;">
			@for ($i = 1; $i <=3 ; $i++)
				@if ($i == 1)
 					<table class="table table-bordered table-sm table-hover table-fixed col-sm-4" style="text-align: center;">
						<thead>
							<tr>
								<th colspan="2">轉學</th>
							</tr>
							<tr>
								<th>金額</th>
								<th>業務</th>
							</tr>
						</thead>
				@endif
				@if ($i == 2)
 					<table class="table table-bordered table-sm table-hover table-fixed col-sm-4" style="text-align: center;">
						<thead>
							<tr>
								<th colspan="2">工研</th>
							</tr>
							<tr>
								<th>金額</th>
								<th>業務</th>
							</tr>
						</thead>
				@endif
				@if ($i == 3)
 					<table class="table table-bordered table-sm table-hover table-fixed col-sm-4" style="text-align: center;">
						<thead>
							<tr>
								<th colspan="2">商研</th>
							</tr>
							<tr>
								<th>金額</th>
								<th>業務</th>
							</tr>
						</thead>
				@endif		
						<tbody>
							@if($placerow == 1)
								@foreach ($query as $element)
									@if ($element->Class == $i && $element->Status =='1' && $element->Place =='B')
										<tr>
											<td>{{$element->Amount}}</td>
											<td>
												{{$element->Name}}
												<input type="hidden" value="{{url('/performance/Delete/'.$element->id)}}">
												<button type="button" class="close Delete">
          											<span>&times;</span>
        										</button>

											</td>
										</tr>
									@endif
								@endforeach
							@else
								@foreach ($query as $element)
									@if ($element->Class == $i && $element->Status =='1' && $element->Place =='C')
										<tr>
											<td>{{$element->Amount}}</td>
											<td>
												{{$element->Name}}
												<input type="hidden" value="{{url('/performance/Delete/'.$element->id)}}">
												<button type="button" class="close Delete">
          											<span>&times;</span>
        										</button>
											</td>
										</tr>
									@endif
								@endforeach
							@endif
						</tbody>
					</table>
								
			@endfor
			</div>	
{{-- 繳清 --}}
			<div class="col-sm-6 row" style="text-align:center; margin: 0;">
			@for ($j = 1; $j <= 3; $j++)
				@if ($j == 1)
					<table class="table table-bordered table-sm table-hover table-fixed col-sm-4 bg-light" style="text-align: center;background-color: #ffffff;">
						<thead>
							<tr>
								<th colspan="2">轉學</th>
							</tr>
							<tr>
								<th>金額</th>
								<th>業務</th>
							</tr>
						</thead>
				@endif
				@if ($j == 2)
					<table class="table table-bordered table-sm table-hover table-fixed col-sm-4 bg-light" style="text-align: center;background-color: #ffffff;">
						<thead>
							<tr>
								<th colspan="2">工研</th>
							</tr>
							<tr>
								<th>金額</th>
								<th>業務</th>
							</tr>
						</thead>
				@endif

				@if ($j == 3)
					<table class="table table-bordered table-sm table-hover table-fixed col-sm-4 bg-light" style="text-align: center;background-color: #ffffff;">
						<thead>
							<tr>
								<th colspan="2">商研</th>
							</tr>
							<tr>
								<th>金額</th>
								<th>業務</th>
							</tr>
						</thead>
				@endif
						<tbody>
							@if($placerow == 1)
								@foreach ($query as $element)
									@if ($element->Class == $j && $element->Status =='2' && $element->Place =='B')
										<tr>
											<td>{{$element->Amount}}</td>
											<td>
												{{$element->Name}}
												<input type="hidden" value="{{url('/performance/Delete/'.$element->id)}}">
												<button type="button" class="close Delete">
          											<span>&times;</span>
        										</button>
											</td>
										</tr>
									@endif
								@endforeach
							@else
								@foreach ($query as $element)
									@if ($element->Class == $j && $element->Status =='2' && $element->Place =='C')
										<tr>
											<td>{{$element->Amount}}</td>
											<td>
												{{$element->Name}}
												<input type="hidden" value="{{url('/performance/Delete/'.$element->id)}}">
												<button type="button" class="close Delete">
          											<span>&times;</span>
        										</button>
											</td>
										</tr>
									@endif
								@endforeach
							@endif
						</tbody>
					</table>
			@endfor
			</div>
		@endfor
		</div>
	</div>

@endsection

@section('js')

    @parent

        <script src="{{ asset('js/Performance.js') }}" defer></script>
@endsection