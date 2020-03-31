

     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
               <br style="margin-bottom: 100px;"></br>
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Ubah Jumlah</h2>
                              <h4>Semua Belanjaanmu ada di sini</h4>
                         </div>
                    </div>
                    <div class="container" style="padding: 30px;">
                    <div class="row">
                    
                    <div class="col-md-3 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge badge-secondary badge-pill"><i class="fa fa-info"></i></span>
                            <span class="text-muted">Informasi</span>
                        </h4>
                        <ul class="list-group mb-3" >
                            
                            
                            <li class="list-group-item d-flex justify-content-between" style="background-color:#eaeaea">
                            <span>Mohon diperhatikan kuantitas setiap produk yang akan anda beli.</span>
                            <strong class="text-success"></strong>
                            </li>
                        </ul>
                        <br>
                    </div>
                    <div class="col-md-9 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted "><?= $user_item_by_id->product_name ;?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php
                            $sum = 0;
                            ?>
                           
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div class="row">
                                <div class="col-sm-3">
                                    <div style="padding:10px;">
                                        <img style="width: 50px; height: 50px;" src="<?= base_url('assets/');?>images/<?= $user_item_by_id->image ;?>" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col-sm-9" >
                                    <form action="<?= base_url('cart/edit/').$user_item_by_id->id_product;?>" method="post">
                                    <div class="row" >
                                        <div class="col-sm-6" style="padding:20px;">
                                            <div class="row" >
                                                <div class="col-sm-4">
                                                    <input type="number" name="qty_input" id="qty_input" style="text-align:center;" class="form-control" min=1 value="<?= $user_item_by_id->qty ;?>">    
                                                </div>
                                                <div class="col-sm-8 pul-left">
                                                    <h5><?= $user_item_by_id->unit;?></h5>
                                                </div>
                                            </div>
                                                
                                        </div>
                                        <div class="col-sm-3" style="padding:20px;">
                                         <button type="submit" class="btn btn-success">Simpan</a>
                                        </div>
                                        <div class="col-sm-3" style="padding:20px;">
                                         <a href="<?= base_url('cart');?>" class="btn btn-default">Batal</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                </li>
                            
                            <?php $sum+= $user_item_by_id->price;?>
                            
                            <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong class="text-success">Rp. <?= number_format($sum);?></strong>
                            </li>
                        </ul>
                    </div>
                    </div>
                    </div>
        </div>
    </div>
</section>


<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script> -->