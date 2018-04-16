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
									<label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('新增收據:') }}</label>
										<select  name="place" required>
											<option value="">請選擇</option>
											<option value="B">台北(B)</option>
											<option value="C">中壢(C)</option>
										</select>
									<div class="col-md-3"  id="name">

										<input class="form-control" name="firstnumber" required>
									</div>
									<p class="h5">
										{{ __('~') }}
									</p>
									<div class="col-md-3">
										<input class="form-control" name="lastnumber" required>
									</div>
									<button type="submit" class="btn btn-primary">
										{{ __('新增') }}
 									</button>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection