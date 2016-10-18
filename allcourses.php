    <?php

include("includes/sessions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>New courses</title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo base_url();?>js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
  


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
         
         

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>         </h2>


                   

                  <ul class="nav navbar-right panel_toolbox">
                    <li>

                       
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <div class="avatar-view" title="Change the avatar">
                         
          <!-- passport start here         -->
      <a href="#"><i class="fa fa-chevron-up"></i></a>
                  <!-- passport ends here         -->
                    </div>

       <!-- Cropping modal -->
 <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
    <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
          <div class="modal-header">
           <button class="close" data-dismiss="modal" type="button">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                        </div>
                    <div class="modal-body">
                       <div class="avatar-body">

           <!-- Upload image and data -->
     <div class="avatar-upload">
       <input class="avatar-src" name="avatar_src" type="hidden">
          <input class="avatar-data" name="avatar_data" type="hidden">
                <label for="avatarInput">Local upload</label>
              <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                            </div>

           <!-- Crop and preview -->
           <div class="row">
             <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                          </div>
                        <div class="col-md-3">
              <div class="avatar-preview preview-lg"></div>
               <div class="avatar-preview preview-md"></div>
              <div class="avatar-preview preview-sm"></div>
                                 </div>
                                    </div>

                 <div class="row avatar-btns">
                           <div class="col-md-9">
                             <div class="btn-group">
                <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
         <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
          <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>

          <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                        </div>
                           <div class="btn-group">
          <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>

         <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>

       <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                          
      <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
     <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                  
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal -->

                        <!-- Loading state -->
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                  


                       <!-- below is the side navigation bar -->

                    <?php  include ('includes/prof_bar.php');?>

                    <!-- above is the side navigation bar -->

                      <?php  include ('includes/allcourses_link.php');?>



                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2></h2>
        <div class="message_wrapper">               

        <h4 class="heading"> 


</div>

       
    

 

<h3> Add new courses </h3>

 <?php  if (isset($justadded)){?>
  <CENTER><h3 style="color:orange;">

    <?php echo $justadded;?>
    </h3></CENTER><br>
    <?php }; ?>

    <?php  if (isset($no)){?>
  <CENTER><h3 style="color:orange;">

    <?php echo $no;?>
    </h3></CENTER><br>
    <?php }; ?>

<?php  if (isset($available)){?>
  <CENTER><h3 style="color:blue;">

    <?php echo $available;?>
    </h3></CENTER><br>
    <?php }; ?>

 



                         <div class="x_content">

                  <!-- start form for validation -->
        <form id="demo-form" data-parsley-validate action='<?php echo base_url();?>addcourse' method='post'>
                    <label for="fullname">Course * :</label>
                    <input type="text" id="fullname" class="form-control" name="co" required />

                    <label for="email">Course Code * :</label>
                    <input type="text" id="email" class="form-control" name="code" data-parsley-trigger="change" required />

                   <label>Semester*:</label>
                    <p>
                      First Semester:
                      <input type="radio" class="flat" name="sem" id="genderM" value="First Semester" checked="" required /> Second Semester:
                      <input type="radio" class="flat" name="sem" id="genderF" value="Second Semester" />
                    </p>

                    

                        <label for="heard">Course Level *:</label>
                        <select id="heard" class="form-control" name='lev' required>
                         
                          <option value="100">100 Level</option>
                          <option value="200">200 Level</option>
                          <option value="300">300 Level</option>
                          <option value="400">400 Level</option>
                          <option value="500">500 Level</option>
                        </select>



                        <label for="heard">Faculty *:</label>
                        <select id="heard" class="form-control" name = 'facid'required>
                         
  <?php  if (isset($fac)){?>
<?php foreach($fac as $it){?>

                          <option value="<?php echo $it->faculty_id;?>"><?php echo $it->facname;?></option><?php }} ?>
                          </select>


                     
                        <br/>
                        <?php echo form_submit(array('id' => 'submit', 'value' => 'Add Course' , 'class' => 'btn btn-primary' )); ?>
                <?php echo form_close(); ?>
                        
                  <!-- end form for validations -->

                </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <?php include ("includes/footer.php");?>
</body>

</html>
