<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>PBS - Login</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="assets/favicon.ico" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="assets/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <!-- color css -->
    <!-- <link rel="stylesheet" href="assets/css/colors.css" /> -->
    <!-- select bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/custom.css" />
    <!-- calendar file css -->
    <!-- <link rel="stylesheet" href="assets/js/semantic.min.css" /> -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="128" src="assets/images/logo/logo_icon.png">
                        </div>
                    </div>
                    <div class="login_form">
                        <form action="/login" method="post">
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="text-center alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif; ?>
                            <fieldset>
                                <div class="field">
                                    <label class="label_field">Username :</label>
                                    <input type="username" name="username" value="<?= set_value('username') ?>">
                                </div>
                                <div class="field">
                                    <label class="label_field">Password :</label>
                                    <input type="password" name="password">
                                </div>

                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button type="submit" class="main_bt">Masuk</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <!-- select country -->
    <script src="assets/js/bootstrap-select.js"></script>

</body>

</html>