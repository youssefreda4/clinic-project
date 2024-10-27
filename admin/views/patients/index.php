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
                    <h1 class="m-0">All Patients</h1>
                    <!-- Search -->
                    <div class="container mt-4 ">
                        <form class="d-flex" action="<?= helperFunction::adminUrl("index.php?page=patient_search"); ?>" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Patient Name" name="patient_name">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                        <span class="text-danger"><?= Session::flash("error"); ?></span>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $home; ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Patients</li>
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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">email</th>
                                        <th class="text-center">Doctor Id</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($patients as $patient) : ?>
                                        <tr>
                                            <th class="text-center"><?= $i++ ?></th>
                                            <th class="text-center"><?= $patient["name"]; ?></th>
                                            <th class="text-center"><?= $patient["phone"]; ?></th>
                                            <th class="text-center"><?= $patient["email"]; ?></th>
                                            <th class="text-center"><?= $patient["doctor_id"]; ?></th>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <?php if (!isset($patient_name)) : ?>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination justify-content-center">
                                    <?php for ($i = 0; $i < $page_numbers; $i++): ?>
                                        <li class="page-item">
                                            <a class="page-link <?= $page_number == $i ? "active" : ""; ?>" href="<?= helperFunction::adminUrl("index.php?page=all-patients&page_number=$i") ?>">
                                                <?= $i + 1 ?></a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                                <div>
                                    <h5 class="text-center"><?= $page_number + 1; ?> of <?= (int)$page_numbers + 1 ?></h5>

                                </div>
                            </div>
                        <?php endif; ?>
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