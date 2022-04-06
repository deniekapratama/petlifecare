<body class="bg-gradient" style="background-color: #f1b8c4;">
  <div id="background-wrap">
    <div class="bubble x1"></div>
    <div class="bubble x2"></div>
    <div class="bubble x3"></div>
    <div class="bubble x4"></div>
    <div class="bubble x5"></div>
    <div class="bubble x6"></div>
    <div class="bubble x7"></div>
    <div class="bubble x8"></div>
    <div class="bubble x9"></div>
    <div class="bubble x10"></div>
  </div>

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form action="<?php echo base_url('login/process_register') ?>" method="POST" class="user">
                <?php
                        if($this->session->flashdata('success')){
                            echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>".$this->session->flashdata('success')."</div>";
                        }
                    ?>
                <input type="hidden" name="level" value="customer">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="fname" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="lname" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required="">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required="">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="re_password" class="form-control form-control-user" id="re_password" placeholder="Repeat Password" required="">
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" name="no_hp" class="form-control form-control-user" id="exampleInputNumberPhone" placeholder="Phone" required="">
                </div>
                <button class="btn btn-primary btn-user btn-block btn-pink" type="submit">
                  Register Account
                </button>
                <hr>
                <div class="text-center">
                  <h3>PetLife-Care</h3>
                </div>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url();?>login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

<script>
  var password = document.getElementById("password")
  , re_password = document.getElementById("re_password");

function validatePassword(){
  if(password.value != re_password.value) {
    re_password.setCustomValidity("Passwords Don't Match");
  } else {
    re_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
re_password.onkeyup = validatePassword;
</script>