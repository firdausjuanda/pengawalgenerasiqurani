     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="<?= base_url('home');?>" style="color:black" class="navbar-brand">Pengawal <span>.</span> Generasi <span>.</span> Qurani</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse" >
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="<?= base_url('home');?>" class="smoothScroll" style="color:black">Beranda</a></li>
                         <li><a href="<?= base_url('program');?>" class="smoothScroll" style="color:black">Program</a></li>
                         <li><a href="<?= base_url('store');?>" class="smoothScroll" style="color:black">Pasar Sehat</a></li>
                         <li><a href="<?= base_url('kajian');?>" class="smoothScroll" style="color:black">Kajian</a></li>
                    </ul>
                    

                    <ul class="nav navbar-nav navbar-right">
                         <li>
                              <!-- <a href="<?= base_url('home');?>" style="color:green; height:50px;"><i class="fa fa-whatsapp"></i></a> -->
                         </li>
                         <!-- <li><a href="<?= base_url('home');?>" style="color:green; height:50px;"><i class="fa fa-whatsapp"></i></a></li> -->
                         <?php
                         if(!$user){
                              echo '<a style="margin-top: 10px;" href="http://localhost/pengawalgenerasiqurani/login" class="btn btn-success">Masuk</a>';
                         } else {
                              echo '<a style="margin-top: 10px; margin-right: 10px" href="http://localhost/pengawalgenerasiqurani/cart" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Keranjang </a>';
                              echo '<a style="margin-top: 10px;" href="http://localhost/pengawalgenerasiqurani/login/logout" class="btn btn-danger"><i class="fa fa-power-off"></i></a>';
                         }
                         ?>
                         
                    </ul>
               </div>

          </div>
     </section>