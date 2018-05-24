@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<form action="{{url('create')}}" method="POST">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="form-group row">
									<label for="user" class="col-sm-2 col-form-label text-md-right">{{ __('新增招生:') }}</label>
									<div class="col-md-3"  id="name" style="padding-left: 0;">

										<input class="form-control" name="createsales">
									</div>
										<button id="createsales" type="submit" class="btn btn-primary col-md-1">
											{{ __('新增') }}
	 									</button>
										
	 								@if($errors->first('createsales'))
										<div class="col-md-4 text-danger">
											<h6>{{'*'.$errors->first()}}</h6>
										</div>
									@endif
	 								
								</div>

								<div class="form-group row">
									<label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('新增收據:') }}</label>
										<select class="form-control col-sm-2" name="place">
											<option value="">{{ __('請選擇') }}</option>
											<option value="B">{{ __('台北(B)') }}</option>
											<option value="C">{{ __('中壢(C)') }}</option>
										</select>
									<div class="col-md-3"  id="name">

										<input class="form-control" name="firstnumber">
									</div>
									<p class="h5">
										{{ __('~') }}
									</p>
									<div class="col-md-3">
										<input class="form-control" name="lastnumber">
									</div>
									<button type="submit" class="btn btn-primary">
										{{ __('新增') }}
 									</button>

	 								@if($errors->first('place'))
	 								<div class="col-md-2"></div>
										<div class="col-sm-2 text-danger" style="margin-top: 10px;">
											<h6>{{'*'.$errors->first('place')}}</h6>
										</div>
									@else
										<div class="col-md-2"></div>
										<div class="col-sm-2"></div>
									@endif

	 								@if($errors->first('firstnumber'))
	 								
										<div class="col-md-3 text-danger" style="margin-top: 10px;">
											<h6>{{'*'.$errors->first('firstnumber')}}</h6>
										</div>
									@else
										<div class="col-md-3"></div>
									@endif

	 								@if($errors->first('lastnumber'))
	 									<p>&nbsp &nbsp</p>
										<div class="col-md-3 text-danger" style="margin-top: 10px;">
											<h6>{{'*'.$errors->first('lastnumber')}}</h6>
										</div>
									@endif
									@if (session('msg'))
										<p>&nbsp &nbsp</p>
										<div class="col-md-4 text-danger" style="margin-top: 10px;">
											<h6>{{'*'.session('msg')}}</h6>
										</div>
									@endif
								</div>


								<div class="form-group row">
									<label for="receipt" class="col-sm-2 col-form-label text-md-right">{{ __('分派收據:') }}</label>
										<select class="form-control col-sm-3" name="receipt" id="receipt">
											<option value="">{{ __('請選擇收據') }}</option>
										@foreach ($query as $value)
											<option value="{{$value->Name}}">{{$value->Name}}</option>
										@endforeach
											
										</select>
										<select class="form-control col-sm-2" name="sales">
											<option value="">{{ __('請選擇業務') }}</option>
										@foreach ($sales as $value)
											<option value="{{$value->Name}}">{{$value->Name}}</option>
										@endforeach
											
										</select>
										<div class="col-md-5">
											<button id="check" type="submit" class="btn btn-primary">
												{{ __('確認分派') }}
		 									</button>
	 									</div>
		 								@if($errors->first('receipt'))
		 								<div class="col-md-2"></div>
											<div class="col-sm-3 text-danger" style="margin-top: 10px;">
												<h6>{{'*'.$errors->first('receipt')}}</h6>
											</div>
										@else
											<div class="col-md-2"></div>
											<div class="col-sm-3"></div>
										@endif
		 								@if($errors->first('sales'))
	 									
										<div class="col-md-3 text-danger" style="margin-top: 10px;">
											<h6>{{'*'.$errors->first('sales')}}</h6>
										</div>
										@endif
								</div>
								<div class="form-group row">
									<label for="changereceipt" class="col-sm-2 col-form-label text-md-right">{{ __('變更使用者:') }}</label>
										<select class="form-control col-sm-3" name="changereceipt" id="changereceipt">
											<option value="">{{ __('請選擇收據') }}</option>
										@foreach ($ChangeReceipt as $value)
											<option value="{{$value->Name}}">{{$value->Name}}</option>
										@endforeach
										</select>
										<select class="form-control col-sm-2" name="changeuser">
											<option value="">{{ __('請選擇業務') }}</option>
										@foreach ($sales as $value)
											<option value="{{$value->Name}}">{{$value->Name}}</option>
										@endforeach
										</select>
										<div class="col-md-5">
											<button id="changecheck" type="submit" class="btn btn-primary">
												{{ __('更改') }}
		 									</button>
	 									</div>
		 								@if($errors->first('changereceipt'))
		 								<div class="col-md-2"></div>
											<div class="col-sm-3 text-danger" style="margin-top: 10px;">
												<h6>{{'*'.$errors->first('changereceipt')}}</h6>
											</div>
										@else
											<div class="col-md-2"></div>
											<div class="col-sm-3"></div>
										@endif
		 								@if($errors->first('changeuser'))
	 									
										<div class="col-md-3 text-danger" style="margin-top: 10px;">
											<h6>{{'*'.$errors->first('changeuser')}}</h6>
										</div>
										@endif
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center;">
			<a class="btn btn-link" role="btn" href="{{url('index')}}">回首頁</a>
		</div>
	</div>
@endsection

@section('js')

    @parent

        <script src="{{ asset('js/index.js') }}" defer></script>
@endsection