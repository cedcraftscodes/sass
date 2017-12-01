<?php include 'auth.php'; ?> 
<?php include 'accountinfo.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Sta Rosa | SASS</title>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="calendar/style.css">
  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../build/css/modalstyle.css">
      <style type="text/css">
        body { padding-right: 0 !important }
    </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <?php include('templates/admin.topnavtitle.php'); ?> 

          <div class="clearfix"></div>
          <?php include('templates/admin.quickinfo.php'); ?> 
          <br />
          <?php include('templates/admin.sidebar.php'); ?> 
          <?php include('templates/admin.menufooter.php'); ?> 

        </div>
      </div>

      <?php include('templates/admin.topnav.php'); ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <!--
        <div class="row tile_count">
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
            <div class="count">2500</div>
            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
            <div class="count">123.50</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
            <div class="count green">2,500</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
            <div class="count">4,567</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
            <div class="count">2,315</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
            <div class="count">7,325</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
          </div>
        </div>
      -->



      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Schedule an Event</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div id="calendar_div">
                  <?php 
                  include 'calendar/functions.php';
                  echo getCalender(); ?>
                </div>

                <!-- Add Item Modal -->
                <div id="addEventModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header modal-header-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Event On <span id="eventDateView"></span></h4>
                      </div>
                      <div class="modal-body">

                        <form class="form-horizontal form-label-left input_mask">

                          <h4>Event Information</h4>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Event Title</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" id="eventTitle"  placeholder="Input event title">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Summary</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <textarea class="form-control" rows="5" placeholder="Tell us about the event."></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Time Start</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="time" class="form-control" id="inputSuccess3">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Time End</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="time" class="form-control" id="inputSuccess3">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Event Status</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <select class="form-control">
                                <option>Approved</option>
                                <option>Blocked</option>
                                <option>Canceled</option>
                              </select>
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>



                          <h4>Organization Information</h4>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Organization Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" placeholder="Name of Organization">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Receiver Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" id="inputSuccess3" placeholder="Name of Receiver" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter Receiver Name">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Street</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter Receiver Name">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" id="inputSuccess3" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter City" name="city" required="">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Province</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" pattern="[a-zA-Z\s]{1,}" title="Letters only!" placeholder="Enter  Province" name="province" required="">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ZipCode</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter  Zip Code" name="zipcode"  title="Enter a valid zip code" pattern="[0-9]{4}"  required="">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control" title="Enter a valid phone number" pattern="[0-9]{11}" placeholder="Enter  Contact Number" name="contactnumber" required="">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                              <input type="email" class="form-control" title="Enter a valid phone number" pattern="[0-9]{11}" placeholder="Enter Email Address" name="contactnumber" required="">
                              <span class="fa fa-user form-control-feedback right" aria-hidden="true" ></span>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                              <input type="hidden" id="eventDate" value=""/>

                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" id="addEventBtn" class="btn btn-success">Submit</button>

                        <input class="btn btn-warning" type="reset" value="Reset"></input>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Add Item Modal -->
              <div id="event_list"></div>






            </div>
          </div>
        </div>
      </div>

    </div>



  </div>
</div>
<!-- /page content -->

<?php include('templates/admin.footer.php'); ?>
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- jQuery Sparklines -->
<script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>




</body>
</html>
