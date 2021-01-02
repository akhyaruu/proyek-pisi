<body class="bg-gradient-primary">

   <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

         <div class="col-xl-10 col-lg-12 col-md-9 mt-5" >

            <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                     <img src="<?= base_url("assets/sb/img/uinsa.png")?>" class="col-lg-5 p-5">
                     <div class="col-lg-6">
                        <div class="p-5">
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">Login</h1>
                           </div>
                           <?= $this->session->flashdata('pesan'); ?>
                           <form class="user" method="post" action="<?= base_url('login'); ?>">
                              <div class="form-group">
                                 <input type="text" class="form-control form-control-user" id="username" name="username"
                                    aria-describedby="emailHelp" placeholder="NIM/NIP">
                                 <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control form-control-user" id="password"
                                    name="password" placeholder="Password">
                                 <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                              </div>

                              <button type="submit" href="index.html" class="btn btn-primary btn-user btn-block">
                                 Login
                              </button>

                           </form>


                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>

      </div>

   </div>