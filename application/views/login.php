
<section id="menu" data-stellar-background-ratio="0.5">
<div class="container">
    <div class="row">
    <br style="margin-bottom: 100px;"></br>
        
    <?= $this->session->flashdata('message'); ?>
        <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Masuk</h2>
                    <h4>Sekali &amp; Selamanya</h4>
                </div>
        </div>
        <div class="card text-center" >
            <div class="col-lg-7 md-12">
                <div class="form-group">
                <img style="width: 30%;" src="<?= base_url('assets/images/system/logo/logo.jpeg');?>" alt="">    
                </div>
            </div> 
            <div class="col-lg-4 md-12" style="margin-bottom: 10px; margin-right: 10px; margin-left: 10px; border: 1px solid green; padding: 30px; border-radius: 20px;" >
                <form action="<?php echo base_url('login');?>" method="post">
                <div class="form-group">
                    <label for="phone">Nomor WhatsApp</label>
                    <input type="number" min=0 class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                    <small style="color:red;"><?= form_error('phone'); ?></small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                    <small style="color:red;"><?= form_error('password1'); ?></small>
                </div>
                <button type="submit" class="btn btn-success">Masuk</button>
                </form>
                <br>
                <p>Belum punya akun? <a href="<?= base_url('registration');?>">Daftar</a>.</p>
            </div>    
                

    </div>
</div>
</section>