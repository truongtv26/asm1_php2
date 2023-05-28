<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?=_DIR_ROOT_?>/public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=_DIR_ROOT_?>/public/assets/css/style.css" rel="stylesheet">
    <title><?=$page_title ?? 'trang chu'?></title>
</head>
<body>
    <?php
//    $this->render('partials/header');
    ?>
    <?php
    $this->render($layout ?? 'customers/list', $main ?? [])
    ?>
    <?php
    $this->render('partials/footer');
    ?>

    <!-- Vendor JS Files -->
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/quill/quill.min.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?=_DIR_ROOT_?>/public/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?=_DIR_ROOT_?>/public/assets/js/main.js"></script>
</body>
</html>