@extends('layouts.app')

@section('content')
	<div class="container">

		{{-- <div> --}}
        <form action="{{url('index/CheckNumbers')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
    		<table class="table table-sm table-hover table-fixed" id='tables' style="text-align: center;background-color: #f5f8fa;">

                <thead>
                    <tr>
                        <th>收據</th>
                        <th>使用者</th>
                        <th>單號</th>
                        <th>操作</th>
                    </tr>
                </thead>

                <tbody>
                	@foreach ($ViewData as $value)
                	<tr>
                		<td>{{$value['Name']}}</td>
                		<td>{{$value['User']}}</td>
                		<td style="text-align: left;">
                        @foreach ($value['Numbers'] as $val)
                            <div class="form-check form-check-inline">
                                <input class="check" type="checkbox" name="Numbers[]" value="{{$val}}">{{$val}}
                            </div>
                        @endforeach
                        </td>
                        <td>
                            <div>
                                <input type="checkbox" name="Name" value="{{$value['Name']}}" style="display: none;">
                                <input type="checkbox" name="User" value="{{$value['User']}}" style="display: none;">
                                <input class="btn btn-link sent" type="submit" value="確認繳回" >
                            </div>
                            <div>
                                <a href="{{url('index/'.$value['Name'])}}">關閉收據</a>
                            </div>
                            <div>
                                <a href="{{url('delete/'.$value['Name'])}}">刪除收據</a>
                            </div>
                        </td>
                    </tr>

                	@endforeach
                </tbody>
            </table>
        </form>

	</div>
    @if($errors->first())
        <input type="hidden" id='errormsg' value="{{$errors->first()}}" placeholder="">
    @endif
@endsection

@section('js')

    @parent

        <script src="{{ asset('js/index.js') }}" defer></script>
@endsection