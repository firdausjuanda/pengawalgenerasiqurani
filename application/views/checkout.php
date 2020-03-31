

     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
               <br style="margin-bottom: 100px;"></br>
                
               <?= $this->session->flashdata('message'); ?>
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                         
                              <h2>Checkout</h2>
                              <h4>Semua Belanjaanmu ada di sini</h4>
                         </div>
                    </div>
                    <div class="container" style="padding: 30px;">
                    <div class="row">
                    <div class="col-md-8 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Identitas</span>
                            <!-- <span class="badge badge-secondary badge-pill"><?= $sum_user_item;?></span> -->
                        </h4>
                        
                        <ul class="list-group mb-3">
                        <form id="form" action="<?= base_url('payment');?>" method="post">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div class="row">
                                <div class="col-sm-6">
                                  <label class="pull-left" for="name">Nama Lengkap</label>
                                  <br>
                                  <input name="name" id="name" class="pull-left form-group form-control" placeholder="Nama kamu..." value="<?= $user['name'];?>" type="text">
                                </div>
                                <div class="col-sm-6">
                                  <label class="pull-left" for="phone">Nomor WA</label>
                                  <br>
                                  <input name="phone" id="phone" class="pull-left form-group form-control" placeholder="Nomor WA kamu..." value="<?= $user['phone'];?>" type="text">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <label class="pull-left" for="address">Alamat</label>
                                  <br>
                                  <input name="address" id="address" class="pull-left form-group form-control" placeholder="Alamat Lengkap kamu..." value="<?= $user['address'];?>" type="text">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-3">
                                  <label class="pull-left" for="name">Provinsi</label>
                                  <br>
                                  <select onChange="change()" name="province" id="province" class="pull-left form-group form-control" value="<?= $user['province'];?>" >
                                    <?php
                                    if(!$user['province']){
                                      echo '<option value="Pilih Provinsi">Pilih Provinsi</option>';
                                    } else {
                                      echo '<option value="';echo $user['province'];echo'">'; echo $user['province']; echo'</option>';
                                    }
                                    ?>
                                    
                                    <?php
                                    foreach($pro as $p):
                                    ?>
                                    <option value="<?= $p->provinsi_tujuan;?>"><?= $p->provinsi_tujuan;?></option>
                                    <?php endforeach;?>
                                  </select>
                                </div>
                                <div class="col-sm-3">
                                  <label class="pull-left" for="name">Kabupaten/Kota</label>
                                  <br>
                                  <select onChange="change()" name="city" id="city" class="pull-left form-group form-control" value="<?= $user['city'];?>" >
                                    <?php
                                    if(!$user['city']){
                                      echo '<option value="Pilih Kab/Kota">Pilih Kab/Kota</option>';
                                    } else {
                                      echo '<option value="';echo $user['city'];echo'">'; echo $user['city']; echo'</option>';
                                    }
                                    ?>
                                    
                                    <?php
                                    foreach($cbp as $c):
                                    ?>
                                    <option value="<?= $c->tujuan;?>"><?= $c->tujuan;?></option>
                                    <?php endforeach;?>
                                  </select>
                                </div>
                                <!-- <div class="col-sm-3">
                                  <label class="pull-left" for="city">Kabupaten/Kota</label>
                                  <br>
                                  <input name="city" id="city" list="suggestions" class="pull-left form-group form-control" placeholder="Kabupaten/Kota" value="<?= $user['city'];?>" type="text">
                                  <datalist id="suggestions">
                                    <?php
                                    foreach($all_ongkir as $ao):
                                    ?>
                                    <option value="<?= $ao['tujuan'];?>"></option>
                                    <?php endforeach;?>
                                  </datalist>
                                </div> -->
                                <div class="col-sm-3">
                                  <label class="pull-left" for="district">Kecamatan</label>
                                  <br>
                                  <input name="district" id="district" class="pull-left form-group form-control" placeholder="Kecamatan" value="<?= $user['district'];?>" type="text">
                                </div>
                                <div class="col-sm-3">
                                  <label class="pull-left" for="zip">Kode POS</label>
                                  <br>
                                  <input name="zip" id="zip" class="pull-left form-group form-control" placeholder="Kode POS" value="<?= $user['zip'];?>" type="text">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-4">
                                  <button stype="submit" class="btn btn-primary form-control">Lihat ongkir</button>
                                </div>
                                <div class="col-sm-4">
                                  <input class="form-control" type="text" readonly value="<?php
                                  if(!$user_ongkir){
                                    echo 'Ekspedisi belum dipilih';
                                  } else {
                                    echo $user_ongkir->ekspedisi; 
                                  }?>
                                  ">
                                </div>
                                <div class="col-sm-4">
                                  <input class="form-control" type="text" readonly value="<?php
                                  if(!$user_ongkir){
                                    echo 'Kabupaten/Kota tidak terdaftar';
                                  } else {
                                    echo 'Rp. '; echo number_format($user_ongkir->harga); 
                                  }?>
                                  ">
                                </div>
                                
                              </div>                              
                            </li>
                        </form>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
             
                            <div class="row">
                                <div class="col-sm-4">
                                  <label class="pull-left text-success" for="">Metode Pembayaran</label>
                                  <select name="" id="" class="form-control">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="">ATM</option>
                                    <option value="">GoPay</option>
                                    <option value="">Cash</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <label class="pull-left text-success" for="">Nama Pemilik Rekening</label>
                                  <input type="text" class="form-control" value="<?= $user['name'];?>">
                                </div>
                                <div class="col-sm-4">
                                  <label class="pull-left text-success" for="">Bukti Pembayaran</label>
                                  <input type="file" class="form-control">
                                </div>
                              </div>

                              <div class="row">
                              <div class="col-sm-12">
                                <strong class="pull-left"> Petunjuk Pembayaran</strong>
                                <br>
                                <p class="pull-left">Pembayaran hanya dilakukan melalui rekening bank berikut ini:</p>
                              </div>
                              <div class="row" style="padding: 10px">
                                <div class="col-sm-12">
                                  <table class="table table-responsive"> 
                                    <tr>
                                      <td><strong class="pull-right">Nomor Rekening</strong></td>
                                      <td><p class="pull-left">1234567890</p></td>
                                    </tr>
                                    <tr>
                                      <td><strong class="pull-right">Nama Bank</strong></td>
                                      <td><p class="pull-left">Mandiri Syariah</p></td>
                                    </tr>
                                    <tr>
                                      <td><strong class="pull-right">Atas Nama</strong></td>
                                      <td><p class="pull-left">Siti Aisyah</p></td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </div>
                            </li>
                        </ul>
                        <!-- <a class="btn btn-primary btn-md btn-block" href="<?= base_url('payment');?>" >Lanjutkan Pembayaran</a> -->
                        <br>
                    </div>
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Total Item</span>
                            <span class="badge badge-secondary badge-pill"><?= $sum_user_item;?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php

                            $times = 0;
                            $sum = 0;
                            foreach($user_item as $ui):
                            
                            ?>
                            <?php $times = $ui->price *= $ui->qty;?>
                            <li class="list-group-item d-flex justify-content-between">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <span class="pull-left"><?= $ui->product_name ;?></span> 
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <p style="font-size:10px; text-align:left;"><?=$ui->qty;?><span> </span><?=$ui->unit;?></p> 
                                    </div>
                                  </div>
                                </div>
                              <div class="col-sm-6">
                                  <strong class="text-muted pull-right">Rp. <?= number_format($ui->price);?></strong>
                                </div>
                              </div>
                            </li>
                            <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?= $ui->product_name ;?></h6>
                                <small class="text-muted"><?= $ui->description;?></small>
                            </div>
                            <span class="text-muted">Rp. <?= number_format($ui->price);?>/<?=$ui->qty;?><span> </span><?=$ui->unit;?></span>
                            </li> -->

                            
                            <?php $sum+= $times;?>
                            <?php endforeach;?>
                            
                            <?php $total = 0 ;?>
                            <?php $total = $sum + $user_ongkir->harga ;?>
                            <li class="list-group-item d-flex justify-content-between">
                              <div class="row">
                                <div class="col-sm-6">
                                  <span class="pull-left"><strong>Belanjaan</strong></span>  
                                </div>
                                <div class="col-sm-6">
                                  <strong class="text-muted pull-right">Rp. <?= number_format($sum);?></strong>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                              <div class="row">
                                <div class="col-sm-6">
                                  <span class="pull-left"><strong>Ongkir</strong></span>  
                                </div>
                                <div class="col-sm-6">
                                  <strong class="text-muted pull-right">Rp. <?= number_format($user_ongkir->harga);?></strong>
                                </div>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                              <div class="row">
                                <div class="col-sm-6">
                                  <span class="pull-left "><strong>Total</strong></span>  
                                </div>
                                <div class="col-sm-6">
                                  <strong class="text-success pull-right">Rp. <?= number_format($total);?></strong>
                                </div>
                              </div>
                            </li>
                            <br>
                            <p><strong>Perhatian:</strong></p>
                            <p>Dengan ini saya menyatakan bahwa pembayaran yang saya lakukan benar-benar asli tanpa ada unsur penipuan. Jika dikemudian hari ditemukan saya melanggar norma perdagangan, saya bersedia untuk diberikan sanksi sebagaimana mestinya.</p>
                        </ul>
                        <a class="btn btn-primary btn-md btn-block" href="<?= base_url('store');?>" >Konfirmasi Pembayaran</a>
                        <br>
                    </div>
                    </div>
                    </div>
        </div>
    </div>
</section>

<script>
  function change(){
    document.getElementById("form").submit();
  }
</script>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script> -->