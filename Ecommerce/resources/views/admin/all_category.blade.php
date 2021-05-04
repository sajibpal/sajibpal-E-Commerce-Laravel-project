@extends('admin.dashboard_layout')

@section('dashcontent')

        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
						  
					   <p class="alert-success">
		                  <?php
		                 
		                   $messege=Session::get('messag');

		                   if($messege){
		                       echo  $messege; 
		                       Session::put('messag',null);

		                       }
	                     ?>
	                 </p>

					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Category Id</th>
								  <th>Category name</th>
								  <th>Category details</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>

						  	@foreach($data as $row) 

							<tr>
								<td>{{$row->id}}</td>
								<td class="center">{{$row->category_name}}</td>
								<td class="center">{{$row->category_descption}}</td>
								<td class="center">
									@if($row->category_status==1)
									  <span class="label label-success">Active</span>
                                    @else
                                       <span class="label label-danger">Unactive</span>
                                    @endif   
								</td>

								<td class="center">
									@if($row->category_status==1)
										<a class="btn btn-danger" href="{{URL::to('/deactive/product/'.$row->id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else  
									    <a class="btn btn-success" href="{{URL::to('/Active/product/'.$row->id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
                                     @endif

									<a class="btn btn-info" href="{{URL::to('/edit/product/'.$row->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete/product/'.$row->id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						 @endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection()
