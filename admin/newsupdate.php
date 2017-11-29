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

  <!-- My Modal Stylesheet -->
  <link rel="stylesheet" type="text/css" href="../build/css/modalstyle.css">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
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


        <div class="container">

          <div class="x_panel">
            <div class="x_title">
              <h2>News & Updates </h2>
              <div class="clearfix"></div>

            </div>
            <div class="x_content">



              <div class="row">
                <div class="col-sm-3">
                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addNewsModal">Add News and Updates</button><p></p>    <!-- Trigger the modal with a button -->
                </div>
                <div class="col-sm-6">

                </div>
                <div class="col-sm-3">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Search</span>
                      <input type="text" name="search_text" id="search_text" placeholder="Title" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>


              <div id="printArea">
                <div class="table-responsive">
                  <table id="itemtable" class="table table-condensed">  <!-- Start of Table -->
                    <thead>
                      <tr>
                        <th class="col-md-1">News ID</th>
                        <th class="col-md-2">Title</th>
                        <th class="col-md-3">Content</th>
                        <th class="col-md-1" >Picture</th>
                        <th class="col-md-1">Writer</th>
                        <th class="col-md-2">Action</th>
                      </tr>
                    </thead>
                    <tbody id="itemsbody"></tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!-- End of Table -->

          <!-- Add Item Modal -->
          <div id="addNewsModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header modal-header-info">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Create News & Update</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" id="add-form" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label" for="iname">Title:</label>
                      <input type="text" class="form-control" id="iname" placeholder="Enter Title" name="title" required="">
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="iname">Content:</label>
                      <textarea class="form-control" name="content" rows=10 style="min-width: 100% ; resize: none;"></textarea>

                    </div>


                    <div class="well">
                      <div class="form-group">
                        <div class="main-img-preview">
                          <img class="thumbnail img-preview" src="https://cdn2.iconfinder.com/data/icons/real-flat-security/512/admin-512.png" title="Preview Logo">
                        </div>
                        <div class="input-group">
                          <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                          <div class="input-group-btn">
                            <div class="fileUpload btn btn-danger fake-shadow">
                              <span><i class="glyphicon glyphicon-upload"></i> Upload Picture</span>
                              <input id="logo-id" name="newspic" type="file" class="attachment_upload">
                            </div>
                          </div>
                        </div>
                        <p class="help-block">* Upload News Picture.</p>
                      </div>

                    </div>


                    <style type="text/css">

                    .form-control, .thumbnail {
                      border-radius: 2px;
                    }
                    .btn-danger {
                      background-color: #B73333;
                    }

                    /* File Upload */
                    .fake-shadow {
                      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                    }
                    .fileUpload {
                      position: relative;
                      overflow: hidden;
                    }
                    .fileUpload #logo-id ,  #logo-id_u{
                      position: absolute;
                      top: 0;
                      right: 0;
                      margin: 0;
                      padding: 0;
                      font-size: 33px;
                      cursor: pointer;
                      opacity: 0;
                      filter: alpha(opacity=0);
                    }
                    .img-preview {
                      max-width: 100%;
                      margin: 0 auto;

                    }
                  </style>


                  <input type = "hidden" name = "action" value = "addNews">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <!-- Update Modal -->
        <div id="updateNewsModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update News</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" id="update-form">
                  <div class="form-group">
                    <label class="control-label" for="iname">Title:</label>
                    <input type="text" class="form-control" id="title_u" placeholder="Enter Title" name="title_u" required="">
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="iname">Content:</label>
                    <textarea class="form-control" name="content_u" id="content_u" rows=10 style="min-width: 100% ; resize: none;"></textarea>

                  </div>


                  <div class="well">
                    <div class="form-group">
                      <div class="main-img-preview">
                        <img class="thumbnail img-preview" src="https://cdn2.iconfinder.com/data/icons/real-flat-security/512/admin-512.png" title="Preview Logo" id="update_newsimg">
                      </div>
                      <div class="input-group">
                        <input id="fakeUploadLogo_u" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                        <div class="input-group-btn">
                          <div class="fileUpload btn btn-danger fake-shadow">
                            <span><i class="glyphicon glyphicon-upload"></i> Upload Picture</span>
                            <input id="logo-id_u" name="newspic_u" type="file" class="attachment_upload">
                          </div>
                        </div>
                      </div>
                      <p class="help-block">* Upload News Picture.</p>
                    </div>

                  </div>




                  <input type = "hidden" id = "u_id" name = "u_id" >
                  <input type = "hidden" name = "action" value = "updateNews">


                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>


              </form>
            </div>

          </div>
        </div>

        <!-- Delete Modal-->
        <div id="deleteModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Item</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger yes" >Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
      </div>  <!-- End of container -->
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

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

<script src="../vendors/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea', height : "480",mode : "textareas",
  force_br_newlines : false,
  force_p_newlines : false,
  forced_root_block : '',
  entity_encoding: 'raw',
visual: true});</script>

<div class="modal fade" id="msgmodal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="msgmodalheader" class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="msgtitle"></h4>
      </div>
      <div class="modal-body">
        <p id="modalmsg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" id="msgmodalbtn" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function() {
    var brand = document.getElementById('logo-id');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
      document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.img-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#logo-id").change(function() {
      readURL(this);
    });




    var brand_u = document.getElementById('logo-id_u');
    brand_u.className = 'attachment_upload_u';
    brand_u.onchange = function() {
      document.getElementById('fakeUploadLogo_u').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL_u(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.img-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#logo-id_u").change(function() {
      readURL_u(this);
    });
  });
</script>







<script type="text/javascript">
    //When the Html or Document Loads, Load the datas in table.
    $(document).ready(function(){
      function showData()
      { 
        $.ajax({

          url: 'newsandupdate/newsFunction.php',
          type: 'POST',
          data: {action : 'showNewsUpdate'},
          dataType: 'html',
          success: function(result)
          {
            $('#itemsbody').html(result);
          },
          error: function()
          {
            $('#msgtitle').text('Something Went Wrong!');
            $('#modalmsg').text('Please contant administrator for assistance!');

            $('#msgmodalbtn').text('Close');
            $('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');

            $('#msgmodalheader').attr('class', 'modal-header modal-header-danger');

            $('#msgmodal').modal('show');

          }
        })
      }

      showData();




      var searchreq = null;
      function load_data(query)
      {
        if (searchreq != null) searchreq.abort();
        searchreq = $.ajax({
          url:"newsandupdate/searchnews.php",
          method:"GET",
          data:{query:query},
          success:function(data)
          {
            $('#itemsbody').html(data);
          }
        });
      }
      $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
          load_data(search);
        }
        else
        {
          showData();

        }
      });
    });




    //Add Form submit handler
    $('#add-form').submit(function(e){
      tinyMCE.triggerSave();
      e.preventDefault();




      var formData = new FormData(this);

      $.ajax({

        url: 'newsandupdate/newsFunction.php',
        type: 'POST',
        cache: false,
        data: formData,
        async: false,
        processData: false,
        contentType: false,
        dataType: 'html',
        success: function(result)
        {
          $('#itemsbody').html(result);
          $('#addNewsModal').modal('toggle');
        },
        error: function()
        {
          $('#msgtitle').text('Something Went Wrong!');
          $('#modalmsg').text('Please contant administrator for assistance!');

          $('#msgmodalbtn').text('Close');
          $('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');

          $('#msgmodalheader').attr('class', 'modal-header modal-header-danger');

          $('#msgmodal').modal('show');

        }
      })
    });







    function deleteNews(id)
    {

      $("#deleteModal").modal("show");
      $('.yes').click(function(e){

        $.ajax({

          url : 'newsandupdate/newsFunction.php',
          type : 'POST',
          data : {action : 'deleteNews', id : id},
          dataType: 'html',

          success: function(result)
          {
            $('#itemsbody').html(result);
            $("#deleteModal").modal("hide");
          },
          error: function()
          {
            $('#msgtitle').text('Something Went Wrong!');
            $('#modalmsg').text('Please contant administrator for assistance!');

            $('#msgmodalbtn').text('Close');
            $('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');

            $('#msgmodalheader').attr('class', 'modal-header modal-header-danger');

            $('#msgmodal').modal('show');

          }
        })

      })
    }

    function updateNews(id)
    {
      $("#updateNewsModal").modal("show");

      $.ajax({

        url : 'newsandupdate/newsFunction.php',
        type : 'POST',
        data : {id : id, action : 'showUpdateNews'},
        dataType: 'json',
        success : function(result)
        {
          $('#title_u').val(result.title);

          $(tinymce.get('content_u').getBody()).html(result.content);

          $("#update_newsimg").attr("src", "../" +result.picture);

          $('#u_id').val(id);
        },
        error: function(x,y,z)
        {
          $('#msgtitle').text('Something Went Wrong!');
          $('#modalmsg').text('Please contant administrator for assistance!');

          $('#msgmodalbtn').text('Close');
          $('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');

          $('#msgmodalheader').attr('class', 'modal-header modal-header-danger');

          $('#msgmodal').modal('show');

        }
      });


      $('#update-form').submit(function(e){
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({

          url: 'newsandupdate/newsFunction.php',
          type: 'POST',
          cache: false,
          data: formData,
          async: false,
          processData: false,
          contentType: false,
          dataType: 'html',
          success: function(result)
          {
            $('#itemsbody').html(result);
            $("#updateNewsModal").modal("hide");
            document.getElementById("logo-id_u").value = "";
          },
          error: function()
          {
            $('#msgtitle').text('Something Went Wrong!');
            $('#modalmsg').text('Please contant administrator for assistance!');

            $('#msgmodalbtn').text('Close');
            $('#msgmodalbtn').attr('class', 'btn btn-danger pull-right');

            $('#msgmodalheader').attr('class', 'modal-header modal-header-danger');

            $('#msgmodal').modal('show');

          }
        })
      }); 
    } 
  </script>
</body>
</html>
