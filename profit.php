<?php
/*******************************************************************************
*  Invoice Management System                                                *
*                                                                              *
* Version: 1.0	                                                               *
* Developer:  Abhishek Raj, Rafaeatul Kabir                  				           *
*******************************************************************************/

include('header.php');
include('functions.php');
include_once("includes/config.php");

?>

<section class="content">
      <!-- Small boxes (Stat box) -->
      
      
      <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
                
                $result = mysqli_query($mysqli, 'SELECT SUM(totalprofit) AS value_sum FROM invoices WHERE status = "paid"'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum']?$row['value_sum']:0;
                echo $sum;
                ?></h3>

              <p>Total Profit</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            
          </div>
        </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php 
                
                $result = mysqli_query($mysqli, 'SELECT SUM(totalprofit) AS value_sum FROM invoices WHERE status = "paid" AND YEAR(created_on) = YEAR(CURRENT_DATE())'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum']?$row['value_sum']:0;
                echo $sum;
                ?></h3>

              <p>Profit this year</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            
          </div>
        </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php
              
              $result = mysqli_query($mysqli, 'SELECT SUM(totalprofit) AS value_sum FROM invoices WHERE status = "paid" AND MONTH(created_on) = MONTH(CURRENT_DATE()) AND YEAR(created_on) = YEAR(CURRENT_DATE())'); 
              $row = mysqli_fetch_assoc($result); 
              $sum = $row['value_sum']?$row['value_sum']:0;
              echo $sum;
              ?></h3>

              <p>Profit this month</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            
          </div>
        </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
              <h3><?php 
                
                $result = mysqli_query($mysqli, 'SELECT SUM(totalprofit) AS value_sum FROM invoices WHERE status = "paid" AND YEARWEEK(`created_on`, 1) = YEARWEEK(CURDATE(), 1)'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum']?$row['value_sum']:0;
                echo $sum;
                ?></h3>

              <p>Profit this week</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php 
                
                $result = mysqli_query($mysqli, 'SELECT SUM(totalprofit) AS value_sum FROM invoices WHERE status = "paid" AND DATE(created_on) = CURDATE()'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['value_sum']?$row['value_sum']:0;
                echo $sum;
                ?></h3>

              <p>Profit Today</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            
          </div>
        </div>
      </div>
      <h3 class="panel-title">Custom Time Period</h3>
      <br>
      <div class="row">
        <form method="post" id="filter_profit"> 
        <input type="hidden" name="action" value="filter_profit"> 
          <div class="col-xs-4 no-padding-right">
                  <div class="form-group">
                      <div class="input-group date" id="profit_start">
                          <input type="text" class="form-control required" name="profit_start" placeholder="Start Date" data-date-format="<?php echo DATE_FORMAT ?>" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
				    </div>
				    <div class="col-xs-4">
				        <div class="form-group">
				            <div class="input-group date" id="profit_end">
				                <input type="text" class="form-control required" name="profit_end" placeholder="End Date" data-date-format="<?php echo DATE_FORMAT ?>" />
				                <span class="input-group-addon">
				                    <span class="glyphicon glyphicon-calendar"></span>
				                </span>
				            </div>
				        </div>
				    </div>
          <div class="col-xs-4">
						<input style="float: none !important;" type="submit" id="action_filter_profit" class="btn btn-success float-right" value="Generate" data-loading-text="Generating...">
					</div>
          </form>
        </div>
        <div class="row">
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3 id="custom_total">NaN</h3>

              <p>Profit in the specified period</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            
          </div>
        </div>
          </div>
          
        <!-- </div> -->
      <!-- </div> -->
     

    </section>
    <!-- /.content -->



<?php
	include('footer.php');
?>