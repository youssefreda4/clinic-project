<?php require_once BASE_ADMIN_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_ADMIN_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_ADMIN_PATH . "views/inc/aside.php"; ?>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Clinic</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $home; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Clinic</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="container ">

                            <?php if (Session::has("error")) : ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <?= Session::flash("error"); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (Session::has("success")) : ?>
                                <div class="alert alert-success text-center">
                                    <?= Session::flash("success") ?>
                                </div>
                                <?php unset($_SESSION["success"]); ?>
                            <?php endif; ?>

                            <form action="<?= helperFunction::adminUrl("index.php?page=create-clinic") ?>" method="POST" enctype="multipart/form-data" class="m-5">

                                <!-- Doctor Name -->
                                <div class="mb-3">
                                    <label for="doctorName" class="form-label">Clinic Name</label>
                                    <input type="text" class="form-control" id="doctorName" name="name">
                                    <span class="text-danger"><?= Session::flash("name"); ?></span>

                                </div>


                                <!-- Doctor Image -->
                                <div class="mb-3">
                                    <label for="doctorName" class="form-label">Clinic Address</label>
                                    <input type="text" class="form-control" id="doctorName" name="address">
                                    <span class="text-danger"><?= Session::flash("address"); ?></span>

                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Add Doctor</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once BASE_ADMIN_PATH . "views/inc/footer.php"; ?>