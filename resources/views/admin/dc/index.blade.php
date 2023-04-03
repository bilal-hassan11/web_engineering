@extends('layouts.admin')
@section('content')

<div class="main-content">

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">  
          <div class="card-block">
            <div class="item_row">
              <div class="row">
              </div>
              <h3>Add Dc Details</h3><br />
              <form class="ajaxForm" role="form" action="{{ route('admin.dcs.store') }}" method="POST">
                @csrf
                <div  class="row" >
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Date</label>
                      <input class="form-control" type="date" name="dc_date" value="{{ (isset($is_update)) ? date('Y-m-d', strtotime($edit_dc->date)) : date('Y-d-d') }}"
                      required>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>GP No</label>
                      <input class="form-control" name="gp_no" type="number" id="gp_no"  value="{{ @$edit_dc->no_of_bags }}"
                      required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group ">
                      <label>Account Name </label>                        
                      <select class="form-control select2" id="payment_account" type="text" name="account_id"   >
                      <option value="">Select account </option>
                      @foreach($accounts AS $account)
                        <option value="{{ $account->hashid }}" @if(@$edit_dc->account_id == $account->id) selected @endif>{{ $account->name }}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Sub Dealer Name</label>
                      <input class="form-control" name="sub_dealar_name" type="text" id="sub_dealar_name"  value="{{ @$edit_dc->no_of_bags }}"
                      required>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Item Name</label>
                      <select class="form-control select2"  type="text" name="item_id[]"   required>                          
                        <option value="">Select item</option>
                        @foreach($items AS $item)
                          <option value="{{ $item->id }}"  @if(@$edit_dc->item_id == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>No Of Begs</label>
                      <input class="form-control" name="no_of_begs[]" type="number" id="no_of_begs"  value="{{ @$edit_dc->no_of_bags }}"
                      required>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Fare</label>
                      <input class="form-control" name="fare[]" type="number" id="fare"  value="{{ @$edit_dc->no_of_bags }}"
                      required>
                    </div>
                  </div>
                  <div class="col-md-4">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address[]" id="address" value="{{ @$edit_dc->remarks }}" required>
                        </div>
                    </div>
                </div>  
                <div class="btn_div"></div>
                <div class="row">
                     
                    <div class="col-md-2 mt-4 mr-8">
                        <div class="form-group">
                            <input type="hidden" name="dc_id" value="{{ @$edit_dc->hashid }}">
                            <button type="submit" name="save_dc" id="save_dc" class="btn btn-success "><i class="fa fa-check"></i> save</button>
                        </div>
                    </div>   
                </div>
                <br /><br />
                              </form>  
               
              <br /><br />         
              </div>
              </div>

</div>
</div>
<div class="box">
  <div class="box-header with-border">
    <h2 class="box-title text-dark">Filters</h2>
  </div>
  <div class="box-body">
    <form action="{{ route('admin.dcs.index') }}" method="GET">
      @csrf
      <div class="row">
        <div class="col-md-3">
          <label class="text-dark">Grand Parent</label>
          <select class="form-control select2" name="grand_parent_id" id="grand_parent_id">
            <option value="">Select grand parent</option>
            @foreach($account_types AS $type)
              @foreach($type->childs AS $child)
                <option value="{{ $child->hashid }}">{{ $type->name }}--{{ $child->name }}</option>
              @endforeach
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label class="text-dark">Parent Account</label>
          <select class="form-control select2" name="parent_id" id="parent_id">
            <option value="">Select  Account</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="text-dark">Items</label>
          <select class="form-control select2" name="item_id" id="item_id">
            <option value="">Select item</option>
            @foreach($items AS $item)
              <option value="{{ $item->hashid }}">{{ $item->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <label for="">Vehicle No</label>
          <input type="text" class="form-control" name="vehicle_no" id="vehicle_no">
        </div>
      </div><br />
      <div class="row"> 
        <div class="col-md-3">
          <label for="">From</label>
          <input type="date" class="form-control" name="from_date" id="from_date">
        </div>
        <div class="col-md-3">
          <label for="">To</label>
          <input type="date" class="form-control" name="to-date" id="to-date">
        </div>
        <div class="col-md-2 mt-3">
          <input type="submit" class="btn btn-primary" value="Search">
        </div>
      </div>
    </form>
  </div>
</div>


<div class="box">
				<div class="box-header with-border">
				  <h2 class="box-title text-dark">All dc Entries</h2>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
          <table  class="table text-fade table-bordered table-hover display nowrap margin-top-10 w-p100" id="example">
      <thead>
          <tr class="text-dark">
            <th>Id.No</th>
            <th>Date</th>
            <th> GP no </th>
            <th> Account Name </th>
            <th> Item Name </th>
            <th> No Of Begs </th>
            <th> Fare </th>
            <th>Address</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach($dcs AS $dc)
          <tr class="text-dark">
            <td>{{ $loop->iteration }}</td>
            <td>{{ date('d-M-Y', strtotime($dc->date)) }}</td>
            <td>{{ $dc->gp_no }}</td>
            <td> <span class="waves-effect waves-light btn btn-outline btn-success">{{ $dc->account->name }} </span></td>
            <td>{{ $dc->item->name }}</td>
            <td>{{ $dc->no_of_bags }}</td>
            <td>{{ $dc->fare }}</td>
            <td>{{ $dc->address }}</td>
            <td width="120">
                    <a href="{{ route('admin.dcs.dc_invoice',['gp_no'=>$dc->gp_no]) }}" >
                              <span class="waves-effect waves-light btn btn-rounded btn-primary-light"><i class="fas fa-download"></i></span>
                            </a>
                    <a href="{{route('admin.dcs.edit', $dc->gp_no)}}"  >
                    <span class="waves-effect waves-light btn btn-rounded btn-primary-light"><i class="fas fa-edit"></i></span>

                    </a>
                    
                  </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
      </tfoot>
    </table>
					</div>              
				</div>
				<!-- /.box-body -->
			  </div>
                
             </div> 
           </div>
         </div>
      </div>
 
</div>

@endsection

@section('page-scripts')
@include('admin.partials.datatable')
<script>

    $('#save_dc').click(function(){
            Swal.fire({
        title: 'Are you sure?',
        text: "You want To Add Another Item !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Add it!'
        }).then((result) => {
        if (result.isConfirmed) {
            
            
            //ADDROW
            i+= 1;
      
            let text1 = "item_id";
            let text2 = i;
            let res = text1.concat(text2);
            
            var html = '<div class="row">'+
                            '<div class="col-md-3 form-group">'+
                                '<label>Items</label>'+
                                '<select class="form-control select2" required name="item_id[]" id='+res+  '>'+
                                    '<option value="">Select  item</option>';
                                    
            html  +=       '</select>'+
                            '</div>'+
                            '<div class="col-md-2 form-group">'+
                                '<label for="">No of Bags </label>'+
                                '<input type="number" class="form-control" name="no_of_begs[]" id="no_of_bags" required>'+
                            '</div>'+
                            '<div class="col-md-2 form-group">'+
                                '<label for="">fare</label>'+
                                '<input type="number" class="form-control" name="fare[]" id="fare" required>'+
                            '</div>'+
                            '<div class="col-md-4 form-group">'+
                                '<label for="">Address</label>'+
                                '<input type="text" class="form-control" name="address[]" id="address" required>'+
                            '</div>'+
                            
                        '</div>';
                        $('.btn_div').before().append(html);                 
                $.ajax({
                    type: 'GET',
                    datatype: 'JSON',
                    contentType: 'application/json',
                    url: "http://localhost/FeedSystem/public/outward/all_items",
                    success: function(result){
                        $.each(result, function (i, value) {
                        console.log(result);
                        $('#'+res).append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                        
                    },
                    error: function(){
                        console.log("no response");
                    }
                    
                });//Ajax Rquest End
 
        }// If Condittion
        })
    })
    
  var i = 0;
  $(document).on('click', '.add_row', function(e){ 
      
     
  });

  $(document).on('click', '.remove_row', function(e){//remove row
      e.preventDefault();
      $(this).parent().parent().remove();
  });


  function check_weight_difference(){//calculate the weight differnce
    var company_weight = $("input[name='company_weight']").val();
    var party_weight   = $("input[name='party_weight']").val();
    var weight_difference = 0;
    if(company_weight != '' && party_weight != ''){
        weight_difference = parseInt(party_weight) - parseInt(company_weight);
        $("input[name=weight_difference]").val(weight_difference);
    }
  }
  $('#company_weight, #party_weight').bind('keyup change', function(){
    check_weight_difference();
  });

  $('#grand_parent_id').change(function(){
    var id    = $(this).val();
    var route = "{{ route('admin.cash.get_parent_accounts', ':id') }}";
    route     = route.replace(':id', id);

   if(id != ''){
      getAjaxRequests(route, "", "GET", function(resp){
        $('#parent_id').html(resp.html);
      });
    }
  })
</script>
@endsection