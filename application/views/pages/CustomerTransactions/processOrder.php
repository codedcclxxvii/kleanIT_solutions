
<?php
 $this->load->view('header');

?>
  
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="center_me">
           Klean Administrative Site
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Process Customer Order</a></li>
           
          </ol>
           
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             

              <div class="box">
                <div class="box-header">
                 <h3>Process Customer Order</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                 <!-- search form -->
                  <div class="row">
                            <div  class="col-md-4">
                            
          <form action="searchJobOrder" method="post">
            <div class="input-group" id="toggleJobNoSearch">
             <label for="jobNoSearch">Search a Job Order:</label>
              <input type="text" name="jobNoSearch" id="jobNoSearch" class="form-control" placeholder="Search Job Order..."
              value=" <?php if(!empty($client)){ 
                    foreach ($client as $customer) {
                      # code...
                      echo $customer->jobcard_id;
                    }
                      
                      } ?>  
                ">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          </div>
          </div>
                   <form role="form" action="insertNewOrder" method="post" id="add_Order">
                <div class="row">
                            <div  class="col-md-4">
                          
                    <div class="form-group" style="display: none" id="toggleJobNo">
                      <label for="jobNo">Job Order No:</label>
                      <input type="text" class="form-control" id="jobNoOrder" name="jobNoOrder" placeholder="Job Order No" required="required" value="" 
                      >
                    </div>

                    
                     <div class="form-group">
                      <label for="lastname">Customer Name:</label>
                      <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customer Name" required="required" value=" <?php if(!empty($client)){ 
                    foreach ($client as $customer) {
                      # code...
                      echo $customer->firstname.'  '.$customer->lastname;
                    }
                      
                      } ?>  
                " readonly>
                    </div>
                    <div class="form-group">
                      <label for="dropDate">Drop Date</label>
                      <input type="date" class="form-control" id="dropDate" name="dropDate" placeholder="Drop Date" required="required"  value=" <?php if(!empty($client)){ 
                    foreach ($client as $customer) {
                      # code...
                      echo $customer->orderdate;
                    }
                      
                      } ?>  
                ">
                    </div>
                    <div class="form-group">
                      <label for="pickDate">Pickup Date</label>
                      <input type="date" class="form-control" id="pickDate" name="pickDate" placeholder="Pick Date" required="required" value=" <?php if(!empty($client)){ 
                    foreach ($client as $customer) {
                      # code...
                      echo $customer->pickdate;
                    }
                      
                      } ?>  
                ">
                    </div>

                    <div class="form-group">
                      <label for="amount">Total Amount Due</label>
                      <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount Due" required="required"
                      value=" <?php if(!empty($garments)){ 
                        $amount=0;
                    foreach ($garments as $garment) {
                      # code...
                      $amount +=$garment->charges;
                      
                    }
                      echo $amount;
                      } ?>  
                " readonly>
                    </div>


                   
                            </div>
                      <div class="col-md-8">
 <button type="button" class="btn btn-info pull-right garmentOrder" data-toggle="modal" data-target="#add_garmentOrder_modal">New Garment Order</button></h3>
                      <table id="orderProcessing" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      
                      <th class="hidden">GarmentId</th>
                      <th>Garment Type</th>
                         <th>Service Type</th>
                        <th>Detailed Description</th>
                        <th>Charges</th>
                        <th>Garment Inspection</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       if(!empty($garments)){
                      foreach ($garments as $garment)
                    {
                      echo '
                      <tr>
                     
                      <td class="hidden">'.$garment->garmentid.'</td>
                      <td>'.$garment->garmentype.'</td>
                      <td> '.$garment->typeservice.'
                        
                        </td>
                        <td >'.$garment->description.'</td>
                        
                        <td >
                       '.$garment->charges.'</td>
                       <td>'.$garment->inspection.'
                       </td>
                       
                       
                        
                            
                      </tr>';
                    }
                  }
                      ?>
                     </tbody>
                   
                  </table>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                      <button type="button" class="btn btn-info pull-right" onclick="newJobOrder()" > New JOb Order</button>
                    </div>
                    <div class="col-md-2">
                     <button type="submit" class="btn btn-info" > Save Record</button> 
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn btn-info pull-left" > Process Payment</button>
                    </div>
                      
                       
                        

                    </div>

                     </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

<?php
 $this->load->view('pages/CustomerTransactions/modals/garmentOrder');

?> 
  <?php
 $this->load->view('footer');

?>