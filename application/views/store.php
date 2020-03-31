

     <!-- MENU-->

     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
               <br style="margin-bottom: 100px;"></br>
                    
               <?= $this->session->flashdata('message'); ?>
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Pasar Sehat</h2>
                              <h4>Essensial Oil &amp; Herbal</h4>
                         </div>
                    </div>
                    <div class="row">
                    <?php
                    foreach($all_product as $ap):
                    ?>
                    
                         <div class="col-sm-4" style="padding: 10px">
                              <div class="card" style="margin-bottom:10px;">
                                   <img style="width: 200px; height: 200px;" src="<?= base_url('assets/');?>images/<?= $ap['image'];?>" class="card-img-top" alt="...">
                                   <div class="card-body">
                                   <h5 class="card-title">Rp. <?= number_format($ap['price']);?>/<?= $ap['unit'];?></h5>
                                   <p class="card-text"><?= $ap['product_name'];?></p>
                                   <a href="<?= base_url('store/add/').$ap['id_product'];?>" class="btn btn-success">Tambahkan ke Keranjang</a>
                                   </div>
                              </div>
                         </div>
                         
                    <?php endforeach ;?>
                    </div>                    

               </div>
          </div>
     </section>

