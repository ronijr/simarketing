<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masuk</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>vendors/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url('auth'); ?>" method="POST">
              <p><h2>PT. CIKAL BUANA PERSADA</h2></p>
               <?php if ( validation_errors() == TRUE): ?>
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <?php echo validation_errors(); ?>
                  </div>
              <?php endif; ?>
              

                <?php if ($this->session->flashdata('login_error') == TRUE): ?>
                   <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    
                  <?php echo $this->session->flashdata('login_error'); ?>
                  </div>
                <?php endif; ?>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default form-control">Masuk</button>
         
              </div>

              <div class="clearfix"></div>

            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
