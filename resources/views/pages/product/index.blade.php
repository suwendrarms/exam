@extends('layouts.ui.web',['activePage'=>'exam'])
@section('content')
<div class="card card-custom" style="min-height: 700px;">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">product
			<span class="d-block text-muted pt-2 font-size-sm"></span></h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
			<div class="dropdown dropdown-inline mr-2">
			</div>
											
				
		</div>
	</div>
	<div class="card-body">
										
		<div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="exampleSelect1">Filter by Printer Type<span class="text-danger"></span></label>
                        <select class="form-control" id="search_box_printer_type">
                            <option value=""></option>
                        <option value="Laser">Laser</option>
                        <option value="Ink Jet">Ink Jet</option>
                        <option value="Dot Matrix">Dot-Matrix</option>
                        <option value="All">All</option>
                        </select>
                    </div>

				</div>

                <div class="col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="exampleSelect1">Sort by lowest price <span class="text-danger"></span></label>
                        <select class="form-control" id="search_box_low">
                        <option value=""></option>
                        <option value="Laser">Laser</option>
                        <option value="Ink Jet">Ink Jet</option>
                        <option value="Dot Matrix">Dot-Matrix</option>
                        <option value="All">All</option>
                        </select>
                    </div>

				</div>

                <div class="col-lg-4 col-xl-4">
                    <div class="form-group">
                        <label for="exampleSelect1">Sort by highest price <span class="text-danger"></span></label>
                        <select class="form-control" id="search_box_hig">
                        <option value=""></option>
                        <option value="Laser">Laser</option>
                        <option value="Ink Jet">Ink Jet</option>
                        <option value="Dot Matrix">Dot-Matrix</option>
                        <option value="All">All</option>
                        </select>
                    </div>

				</div>
                
			</div>
		</div>
									
		<table class="table">
			<thead>
			    <tr class="datatable-row">
					<th title="Field #1">No</th>
                    <th title="Field #2">Product</th>
					<th title="Field #2">Price</th>
					<th title="Field #3">status</th>
				</tr>
			</thead>
			<tbody id="iq-card-body-search">
					
			</tbody>
	    </table>
		<!--end: Datatable-->
	</div>						
</div>

@endsection

@section('footer')

	@include('includes.footer')

@endsection

@section('js')

<script src="{{ asset('ui/web/js/pages/crud/ktdatatable/base/html-table.js') }}"></script>
<script>
$(document).on('change', '#search_box_printer_type', function(e) {
    $('#iq-card-body-search').html('');
    var search_value = $('#search_box_printer_type').val();
    console.log(search_value);

           var formData = new FormData();

		   formData.append('val', search_value);
	  
		    $.ajaxSetup({
			 headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		    });


		    $.ajax({
			  url : '/filter/printerType',
			  method : 'POST',
			  data : formData,
			  processData: false,  
			  contentType: false, 
			  success : function(result) {
				  
				console.log(result);
                if(result.length > 0){

                    result.forEach(function(i,v){
                        var num=v+1;
                        $('#iq-card-body-search').append('<tr><td>'+num+'</td><td>'+i.product+'</td><td>$'+i.price+'</td><td>'+i.status+'</td></tr>');

                    });
                }
								  
			  }
				   
		    });

});

$(document).on('change', '#search_box_low', function(e) {
    $('#iq-card-body-search').html('');
    var search_value = $('#search_box_low').val();
    console.log(search_value);

           var formData = new FormData();

		   formData.append('val', search_value);
	  
		    $.ajaxSetup({
			 headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		    });


		    $.ajax({
			  url : '/filter/lowestPrice',
			  method : 'POST',
			  data : formData,
			  processData: false,  
			  contentType: false, 
			  success : function(result) {
				  
				console.log(result);
                if(result.length > 0){

                    result.forEach(function(i,v){
                        var num=v+1;
                        $('#iq-card-body-search').append('<tr><td>'+num+'</td><td>'+i.product+'</td><td>$'+i.price+'</td><td>'+i.status+'</td></tr>');

                    });
                }
								  
			  }
				   
		    });

}); 

$(document).on('change', '#search_box_hig', function(e) {
    $('#iq-card-body-search').html('');
    var search_value = $('#search_box_hig').val();
    console.log(search_value);

           var formData = new FormData();

		   formData.append('val', search_value);
	  
		    $.ajaxSetup({
			 headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		    });


		    $.ajax({
			  url : '/filter/highestPrice',
			  method : 'POST',
			  data : formData,
			  processData: false,  
			  contentType: false, 
			  success : function(result) {
				  
				console.log(result);
                if(result.length > 0){

                    result.forEach(function(i,v){
                        var num=v+1;
                        $('#iq-card-body-search').append('<tr><td>'+num+'</td><td>'+i.product+'</td><td>$'+i.price+'</td><td>'+i.status+'</td></tr>');

                    });
                }
								  
			  }
				   
		    });

}); 
</script>
@endsection