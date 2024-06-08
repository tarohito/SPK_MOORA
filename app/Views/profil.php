<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Profil Administrator</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="white_shd full margin_bottom_30">
                <div class="full price_table padding_infor_info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">
                                <div class="profile_img">
                                    <img width="180" class="rounded-circle" src="assets/images/layout_img/user_img.jpg" alt="#" />
                                </div>
                                <div class="profile_contant">
                                    <div class="contact_inner">
                                        <form action="/profil/update" method="post">
                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?? '' ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-secondary" type="button" id="togglePassword"><i class="fa fa-eye" style="color: white;"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Perbarui Profil</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var passwordFieldType = passwordInput.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordInput.setAttribute('type', 'text');
            this.innerHTML = '<i class="fa fa-eye-slash" style="color: white;"></i>';
        } else {
            passwordInput.setAttribute('type', 'password');
            this.innerHTML = '<i class="fa fa-eye" style="color: white;"></i>';
        }
    });
</script>

<?= $this->endSection(); ?>