@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
  					<div class="card-header">
    					{{$Request->Name . ' / '.$Request->User}}
  					</div>
  				</div>
  				<br>
  				
  				<div class="card t" style="margin-bottom: 10px;">
  					<div class="card-body row justify-content-center">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="Name" value="{{$Request->Name}}">
              <input type="hidden" name="User" value="{{$Request->User}}">
              <div class="col-sm-12 row">
                
              
              <div class="col-sm-12" style="padding-right: 0;">號碼:</div>
              @foreach ($Request['Numbers'] as $element)
  						<div class="col-sm-2"  style="padding-right: 0;">
                
  							<input class="form-control-plaintext text-success" name="Numbers" type="text" value="{{$element}}" readonly>
                
  						</div>
              @endforeach
              </div>
              <div class='col-sm-3'>
                <select class="form-control" name="Transactor" aria-describedby="HelpBlock">
                  <option value="">{{ __('選擇業務') }}</option>
                @foreach ($sales as $value)
                  <option value="{{$value->Name}}">{{$value->Name}}</option>
                @endforeach
                </select>
                <small id="HelpBlock" class="form-text text-muted text-success">
                  <p class="text-danger">*此選項為選填</p>
                </small>
              </div>
              <div class="col-sm-3"> 
							 <input class="form-control date start" type="text" placeholder="開立時間" maxlength="10">
						  </div>
  						<div class="col-sm-3"> 
							 <input class="form-control date end" type="text" placeholder="繳回時間" maxlength="10">
						  </div>
  						<div class="col-sm-2">
  							<button class="btn" type="btn">確認</button>
  						</div>			
  					</div>
  				</div>
  				
			</div>
		</div>
	</div>

@endsection

@section('js')

    @parent
        
        <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}" defer></script>
        <script src="{{ asset('js/checknumbers.js') }}" defer></script>
@endsection