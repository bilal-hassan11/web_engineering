<!doctype >
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta Content-Type = "application/json">
    
	<title>Delivery Challan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        @page { size: auto;  margin: 0mm; }
       .challan_details {
    display: flex;
    /* align-items: center; */
    justify-content: space-between;
    margin: 25px 0px;
    width: 100%;
}
.bottom{
    margin-top: 100px;
}
p{
    font-size: 14px;
}
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="challan_wrapper">
                    <h3 class="text-center">Delivery Challan</h3>
                    <p class="text-center">Hello: 022-3886453, 022-3886672, 022-3886477</p>
                    <h5 class="text-center">Gate Pass</h5>

                    <div class="challan_details mt-10">
                        <div class="details_left">
                            <p><strong>DC Number:</strong> SF-{{ @$dcs[0]->gp_no }}</p>
                            <p><strong>Dealer:</strong> Cash Sales</p>
                            <p><strong>Farmer:</strong>  {{ @$dcs[0]->gp_no }}</p>
                            <p><strong>City:</strong>Tando Jam</p>
                        </div>
                        <div class="details_right">
                            <p><strong>Date:</strong> 24-Mar-2023</p>
                            <p><strong>Mobile:</strong> 0315-51514515</p>
                                <p><strong>Supervisor:</strong> 0315-54541455
                            </p>
                            <p><strong>Fare:</strong>{{ @$dcs[0]->fare}}</p>
                            <p><strong>Vechicle:</strong> Loader</p>
                        </div>
                    </div>

                    <table class="table table-bordered border-primary">
                       <thead>
                            <th>Sr.No</th>
                            <th>Items</th>
                            <th>Quantity</th>
                       </thead>
                       <tbody>
                        <?php $tot_beg = 0; ?>
                            @foreach($dcs as $dc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{@$dc->item->name}}</td>
                                <td>{{@$dc->no_of_bags }} Bags</td>
                            </tr>
							<?php $tot_beg += @$dc->no_of_bags; ?>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                
                                <td><?= @$tot_beg ?> Bags</td>
                            </tr>
                       </tbody>
                    </table>

                    <div class="bottom">
                        <div class="row">
                            <div class="col">
                                <p>Driver Name & Signature</p>
                            </div>

                            <div class="col text-end">
                                <p>Deliver's Signature</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="challan_wrapper">
                    <h3 class="text-center">Delivery Challan</h3>
                    <p class="text-center">Hello: 022-3886453, 022-3886672, 022-3886477</p>
                    <h5 class="text-center">Gate Pass</h5>

                    <div class="challan_details mt-10">
                        <div class="details_left">
                            <p><strong>DC Number:</strong> SF-24127</p>
                            <p><strong>Dealer:</strong> Cash Sales</p>
                            <p><strong>Farmer:</strong> Farrukh PF</p>
                            
                            <p><strong>City:</strong>Tando Jam</p>
                        </div>
                        <div class="details_right">
                            <p><strong>Date:</strong> 24-Mar-2023</p>
                            <p><strong>Mobile:</strong> 0315-51514515</p>
                                <p><strong>Supervisor:</strong> 0315-54541455
                            </p>
                            <p><strong>Fare:</strong>000000</p>
                            <p><strong>Vechicle:</strong> Loader</p>
                        </div>
                    </div>

                    <table class="table table-bordered border-primary">
                       <thead>
                            <th>Sr.No</th>
                            <th>Items</th>
                            <th>Quantity</th>
                       </thead>
                       <tbody>
                        <?php $tot_beg = 0; ?>
                            @foreach($dcs as $dc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{@$dc->item->name}}</td>
                                <td>{{@$dc->no_of_bags }} Bags</td>
                            </tr>
							<?php $tot_beg += @$dc->no_of_bags; ?>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                
                                <td><?= @$tot_beg ?> Bags</td>
                            </tr>
                       </tbody>
                    </table>

                    <div class="bottom">
                        <div class="row">
                            <div class="col">
                                <p>Driver Name & Signature</p>
                            </div>

                            <div class="col text-end">
                                <p>Deliver's Signature</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="challan_wrapper">
                    <h3 class="text-center">Delivery Challan</h3>
                    <p class="text-center">Hello: 022-3886453, 022-3886672, 022-3886477</p>
                    <h5 class="text-center">Gate Pass</h5>

                    <div class="challan_details mt-10">
                        <div class="details_left">
                            <p><strong>DC Number:</strong> SF-24127</p>
                            <p><strong>Dealer:</strong> Cash Sales</p>
                            <p><strong>Farmer:</strong> Farrukh PF</p>
                            <p><strong>City:</strong>Tando Jam</p>
                        </div>
                        <div class="details_right">
                            <p><strong>Date:</strong> 24-Mar-2023</p>
                            <p><strong>Mobile:</strong> 0315-51514515</p>
                                <p><strong>Supervisor:</strong> 0315-54541455
                            </p>
                            <p><strong>Fare:</strong>000000</p>
                            <p><strong>Vechicle:</strong> Loader</p>
                        </div>
                    </div>

                    <table class="table table-bordered border-primary">
                       <thead>
                            <th>Sr.No</th>
                            <th>Items</th>
                            <th>Quantity</th>
                       </thead>
                       <tbody>
                        <?php $tot_beg = 0; ?>
                            @foreach($dcs as $dc)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{@$dc->item->name}}</td>
                                <td>{{@$dc->no_of_bags }} Bags</td>
                            </tr>
							<?php $tot_beg += @$dc->no_of_bags; ?>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                
                                <td><?= @$tot_beg ?> Bags</td>
                            </tr>
                       </tbody>
                    </table>

                    <div class="bottom">
                        <div class="row">
                            <div class="col">
                                <p>Driver Name & Signature</p>
                            </div>

                            <div class="col text-end">
                                <p>Deliver's Signature</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
 <script>
window.addEventListener('load', function() {
        window.print();
    });
</script> 
</body>
</html>