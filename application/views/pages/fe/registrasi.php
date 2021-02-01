<!--<form action="<?php echo base_url() ?>Student/daftar" method="post">
    Username: <input type="input" name="uname"><br>
    email   :<input type="email" name="email"><br>
    Password:<input type="password" name="upass"><br>
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <input type="submit" value="kirim">

</form> -->

    <!--================================
            START SIGNUP AREA
    =================================-->
    <section class="signup_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                <form action="<?php echo base_url() ?>Student/daftar" method="post">
                        <div class="cardify signup_form">
                            <div class="login--header">
                                <h3>Buat Akun</h3>
                                <p>Silahkan masukkan keterangan yang dibutuhkan pda form dibawah
                                </p>
                            </div>
                            <!-- end .login_header -->

                            <div class="login--form">

                                <div class="form-group">
                                    <label for="uname">Username</label>
                                    <input id="uname" name="uname" type="text" class="text_field" placeholder="Masukkan Nama User Login Anda">
                                </div>

                                <div class="form-group">
                                    <label for="email_ad">Email</label>
                                    <input id="email_ad" type="text" class="text_field" name="email" placeholder="Masukkan Email ">
                                </div>

                                <div class="form-group">
                                    <label for="password">Kata Kunci</label>
                                    <input id="password" name="upass" type="text" class="text_field" placeholder="Masukkan Password Anda">
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input class="btn btn--md btn--round register_btn" type="submit" value="Daftar Sekarang">
                                <div class="login_assist">
                                    <p>Sudah Punya Akun?
                                        <a href="<?php echo base_url('mylogin') ?>">Masuk</a>
                                    </p>
                                </div>
                            </div>
                            <!-- end .login--form -->
                        </div>
                        <!-- end .cardify -->
                    </form>
                </div>
                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
    </section>
    <!--================================
            END SIGNUP AREA
    =================================-->