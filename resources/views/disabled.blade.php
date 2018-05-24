@extends('layouts.app')

@section('content')
	<div class="container">

        <form action="{{url('index/CheckNumbers')}}" method="POST">
        	<input type="hidden" name="_token" value="{{csrf_token()}}">
				<table class="table table-sm table-fixed" id='tables' style="text-align: center;">
					<thead>
						<tr>
							<th>收據</th>
							<th>使用者</th>
							<th>單號</th>
							<th>關閉時間</th>
							<th>操作</th>
					
						</tr>
					</thead>
					<tbody>
					@foreach ($query as $value)
						<tr>
							<td>{{$value->Name}}</td>
							<td>{{$value->User}}</td>
							<td style="text-align: left;">
						@foreach ($ViewData as $element)
							@if ($value->Name==$element->Name )
								@if ($element->status =='Y')
									<div class="form-check form-check-inline">

                                		<input class="check" type="checkbox" name="Numbers[]" value="{{$element->Numbers}}">

{{-- 											<a tabindex="0" class="btn btn-link btn-sm text-danger" role="button" data-placement="top" data-toggle="popover" data-trigger="focus" data-content="開立日期:  繳回日期:{{$element->PayBack_time}}"  style="padding: 0;">

												{{$element->Numbers}}

											</a> --}}
											<button type="button" class="btn btn-link btn-sm text-danger" data-toggle="tooltip" data-placement="top" title=""  style="padding: 0;">
  												{{$element->Numbers}}
											</button>
                            		</div>
							
								@else
									<div class="form-check form-check-inline">

										<input class="check" type="checkbox" name="Numbers[]" value="{{$element->Numbers}}" disabled>

{{-- 											<a tabindex="0" class="btn btn-link btn-sm text-dark" role="button" data-placement="top" data-toggle="tooltip" data-trigger="focus" data-content="開立日期:  繳回日期:{{$element->PayBack_time}}"  style="padding: 0;">

												{{$element->Numbers}}

											</a> --}}
											<button type="button" class="btn btn-link btn-sm text-success" data-toggle="tooltip" data-placement="top" data-html="true" title="收據開立人:&nbsp&nbsp&nbsp{{$element->Transactor}}<br>開立日期: {{$element->Start_time}}<br>繳回日期:{{$element->PayBack_time}}"  style="padding: 0;">
  												{{$element->Numbers}}
											</button>
									</div>
								@endif

							@endif
						@endforeach		
							</td>
							<td>{{$value->End_time}}</td>
							<td>
								<input type="checkbox" name="Name" value="{{$value['Name']}}" style="display: none;">
								<input type="checkbox" name="User" value="{{$value['User']}}" style="display: none;">
                                <input class="btn btn-link sent" type="submit" value="補繳" >
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
		</form>
		<div class="col-md-12" style="text-align: center;">
			<a class="btn btn-link" role="btn" href="{{url('index')}}">回首頁</a>
		</div>
	</div>
    @if($errors->first())
        <input type="hidden" id='errormsg' value="{{$errors->first()}}" placeholder="">
    @endif
@endsection

@section('js')

    @parent

        <script src="{{ asset('js/retrieve.js') }}" defer></script>
@endsection