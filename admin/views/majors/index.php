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
                    <h1 class="m-0">All Majors</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $home; ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Majors</li>
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

                        <?php if (Session::has("errors")) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?= Session::flash("errors"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (Session::has("success")) : ?>
                            <div class="alert alert-success text-center">
                                <?= Session::flash("success") ?>
                            </div>
                        <?php endif; ?>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($majors as $major) : ?>
                                        <tr>
                                            <th class="text-center"><?= $i++ ?></th>
                                            <th class="text-center"><?= $major["major_name"]; ?></th>

                                            <th class="text-center">
                                                <a href="<?= helperFunction::adminUrl("index.php?page=delete-major&major_id=" . $major["id"]) ?>" class="btn btn-danger">Delete</a>
                                            </th>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.content-wrapper -->

<?php require_once BASE_ADMIN_PATH . "views/inc/footer.php"; ?>