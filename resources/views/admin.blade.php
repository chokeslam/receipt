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
										<button id="createsales" type="submit" class="btn btn-primary">
											{{ __('新增') }}
	 									</button>
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

								</div>

								<div class="form-group row">
									<label for="user" class="col-sm-2 col-form-label text-md-right">{{ __('分派收據:') }}</label>
										<select class="form-control col-sm-3" name="receipt">
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
										<div class="col-md-3">
											<button id="check" type="submit" class="btn btn-primary">
												{{ __('確認分派') }}
		 									</button>
	 									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection