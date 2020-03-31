

     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
               <br style="margin-bottom: 100px;"></br>
                    
               <?= $this->session->flashdata('message'); ?>
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Keranjang</h2>
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
                            <span class="text-muted ">Total Item</span>
                            <span class="badge badge-secondary badge-pill"><?= $sum_user_item;?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php
                            $times = 0;
                            $sum = 0;
                            foreach($user_item as $ui):
                            ?>
                           
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div class="row">
                                <div class="col-sm-3">
                                    <div style="padding:10px;">
                                        <img style="width: 50px; height: 50px;" src="<?= base_url('assets/');?>images/<?= $ui->image ;?>" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div>
                                        <h5 class="my-0"><?= $ui->product_name ;?></h5>
                                        <small class="text-muted"><?= $ui->description;?></small>
                                    </div>
                                    <span class="text-muted">Rp. <?= number_format($ui->price);?></span>
                                </div>
                                <div class="col-sm-6" >
                                    <div class="row" >
                                        <div class="col-sm-3" style="padding:20px;">
                                            <p style="background-color:white; color: green; font-weight:bold;" class="btn"><?=$ui->qty?><span> </span><?=$ui->unit?></p>
                                        </div>
                                        <div class="col-sm-3" style="padding:20px;">
                                         <a href="<?= base_url('cart/edit/').$ui->id_product;?>" class="btn btn-success">Ubah Jumlah</a>
                                        </div>
                                        <div class="col-sm-6" style="padding:20px;">
                                         <a href="<?= base_url('cart/delete/').$ui->id_product;?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </li>
                            
                            <?php $times = $ui->price *= $ui->qty;?>
                            <?php $sum+= $times;?>
                            <?php endforeach;?>
                            
                            <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong class="text-success">Rp. <?= number_format($sum);?></strong>
                            </li>
                        </ul>
                        <a class="btn btn-primary btn-md btn-block" href="<?= base_url('payment');?>" >Lanjutkan Pembayaran</a>
                        <br>
                    </div>
                    </div>
                    </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function formAJAX(btn){
        var $form = $btn.closest('[action]');
        var str = $form.find('[qty_input]').serialize();
        $.post($form.attr('action'), str, function(data));
    }
</script>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script> -->