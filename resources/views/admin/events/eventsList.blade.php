@extends('layout.backend')
@section('event', 'active')
@section('title','Program List')
<?php 
use App\component\Content; ?>
@section('content')
<div class="wrapper">
	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>
  	@include('admin.include.header')
  	<!-- Left side column. contains the logo and sidebar -->
  	@include('admin.include.leftMenu')

  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
  		<section class="content">
	  		@include('admin.include.message')
		    <section class="col-md-12 row">
			    <h3>Events Lists <i class="fa fa-angle-double-right"></i> <a href="{{route('createCreate')}}" class="btn btn-primary btn-xs"> Add New</a></h3><br>
		    </section>
				<span><a href="{{route('eventList')}}">Published({{App\Events::where('status', 1)->count()}})</a> | <a href="{{route('eventList')}}?sort=trash">Trash({{App\Events::where('status', 0)->count()}})</a></span>
		    <form  action="{{route('statusChangeEvent')}}" method="POST">
			    {{csrf_field()}}
			    <table id="example" class="table table-hover" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>
			               		<input type="checkbox" id="check_all" style="width:16px;height:16px; opacity: 0.7;"> 
				            </th>
			                <th>Image</th>
			                <th>Title</th>
			                <th>Location</th>
			                <th>Website</th>
			                <th>Users</th>
			                <th>Date</th>
			                <th class="text-right">Status</th>
			            </tr>
			        </thead>
			    	<tbody>
			    		@foreach($events as $event)
		    			<tr class="tour_row">
		    				<td width="8px" style="vertical-align:middle;text-align:center;">
		    					<input type="checkbox" name="checkall[]" class="checkall" style="width: 16px;height:16px;opacity:0.7;" value="{{$event->id}}">
							</td>
		    				<td style="width:6%;vertical-align:middle;text-align:center;">
		    					<img style="width: 100%;" src="{{Content::urlImage($event->photo)}}">
		    				</td>
		    				<td>{{ str_limit($event->title, 58)}}</td>
		    				<td>{{{ $event->province->province_name or ''}}}, {{{ $event->country->country_name or ''}}}</td>
		    				<td width="100px">
		    					@foreach($event->web as $wb)
		    						<span class="label label-default">{{$wb->name}}</span>
		    					@endforeach
		    				</td>
		    				<td width="80px">{{{ $event->user->fullname or '' }}}</td>
		    				<td style="width:110px;">{{ date('d-M-Y',strtotime($event->updated_at))}}</td>
		    				<td class="text-right" style="width: 8%;">
	    						<a href="{{route('eventEdit',['id'=>$event->id])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
		    					@if(Auth::user()->role_id == 1)
									@if(isset($_GET['sort']))
			    						<a data-action="event-trash" data-id="{{$event->id}}" class="btnDelete btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"></i></a>
									@else
										<a data-action="event" data-id="{{$event->id}}" class="btnDelete btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"></i></a>
									@endif
		    					@endif
		    				</td>
		    			</tr>
			    		@endforeach
			    	</tbody>
			    </table>
			    @if(isset($_GET['sort']))
					<input type="submit" name="btnStatus" value="Publish" class="btn btn-primary btn-xs btnStatus" disabled="enabled">
				@else
					<input type="submit" name="btnStatus" value="Move to trash" class="btn btn-danger btn-xs btnStatus" >
				@endif
			</form>
	    </div>
	    <div class="clearfix"></div>
   </div>
   @include('admin.include.footer')
</div>
@endsection

