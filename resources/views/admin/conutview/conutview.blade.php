@extends('layout.backend')
@section('countview', 'active')
@section('title', 'View List')
@section('content')
<div class="wrapper">
  	@include('admin.include.header')
  	@include('admin.include.leftMenu')
  	<script type="text/javascript" src="{{ asset('adminlte/js/lib/jquery.dataTables.min.js') }}"></script>
  	<div class="content-wrapper"> 
 <!-- start section =====================================================		 -->
		<section class="content">
				<!-- script for news message json -->
			@include('admin.include.message')			
			<!-- end message json>? -->
		
			<form action="{{route('delete__counting')}}" method="POST">
				{{csrf_field()}}	
			<table id="example" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>

		            	<th><input type="checkbox" id="check_all" style="width: 16px; height: 16px; opacity: 0.7;"></th>
		                
		                <th>Ip</th>
		                <th>CityName</th>
		                <th>CountryName</th>
		                <th>TimeZone</th>
		                <th>Tour Titile</th>
		            
		                <th>Website</th>
		                <th style="width: 80px;">Created_at</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($data_count as $data_c)
		            <tr>
		                <td><input type="checkbox" name="checkall[]" class="checkall" style="width: 16px;height:16px;opacity:0.7;" value="{{$data_c->id}}"></td>
		          
		            	<td>{{$data_c->ip}}</td>
		            	<td>{{$data_c->cityName}}</td>
		            	<td>{{$data_c->countryName}}</td>
		            	<td>{{$data_c->timezone}}</td>

		            	<td><a target="_blank" href="http://{{$data_c->web_name}}/myanmar-tour/{{$data_c->slug}}">{{$data_c->title}}</a></td>
		            
		            	<td>{{$data_c->web_name}}</td>
		            	<td style="width: 80px;">{{ $data_c->month}}</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		        @if(isset($_GET['sort']))
					<input type="submit" name="btnStatus" value="Publish" class="btn btn-primary btn-xs btnStatus" disabled="enabled">
				@else
					<input type="submit" name="btnStatus" value="Move to Delete" class="btn btn-danger btn-xs btnStatus" >
				@endif
			</form>
		</section>
<!-- end section ====================================================-->


<!-- start section====================================================-->
		<section class="content">

			<table id="exam" class="table table-hover " cellspacing="0" width="100%">
		        <thead>
		            <tr>     
		                <th>Tour Titile</th>
		                <th>Count View</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($data_countview as $data_c)
		            <tr>
		            	<td>{{$data_c->title}}</td>
		            	<td>{{$data_c->total}}</td>
		            </tr>
		            @endforeach
		        </tbody>
		    </table>
		</section>

<!-- end section =========================================================-->
    </div>
   	@include('admin.include.footer')
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();

	     $('#exam').DataTable();
	} );
</script>
@endsection

