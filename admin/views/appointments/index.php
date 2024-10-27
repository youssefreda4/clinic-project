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
                    <h1 class="m-0">All Appointments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $home; ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Appointments</li>
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
                            <?php unset($_SESSION["success"]); ?>
                        <?php endif; ?>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Appointment Date</th>
                                        <th class="text-center">Patient Name</th>
                                        <th class="text-center">Doctor Name</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($appointments as $appointment) : ?>
                                        <tr>
                                            <th class="text-center"><?= $i++ ?></th>
                                            <th class="text-center"><?= $appointment["created_at"]; ?></th>
                                            <th class="text-center"><?= $appointment["appointment_date"]; ?></th>
                                            <th class="text-center"><?= Database::getAll("patients", "name", "WHERE id =" . $appointment["patient_id"])[0]["name"]; ?></th>
                                            <th class="text-center"><?= Database::getAll("doctors", "name", "WHERE id =" . $appointment["doctor_id"])[0]["name"]; ?></th>

                                            <th class="text-center">
                                                <?php if ($appointment["status"] === "active"): ?>
                                                    <a href="<?= helperFunction::adminUrl("index.php?page=status&id=" . $appointment['id'] . "&status=non-active&page_number=" . $_GET["page_number"]); ?>" class="btn btn-success">Active</a>
                                                <?php else: ?>
                                                    <a href="<?= helperFunction::adminUrl("index.php?page=status&id=" . $appointment['id'] . "&status=active&page_number=" . $_GET["page_number"]); ?>" class="btn btn-danger">Non-Active</a>
                                                <?php endif; ?>
                                            </th>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <?php if (!isset($search_name)) : ?>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination justify-content-center">
                                    <?php for ($i = 0; $i < $page_numbers; $i++): ?>
                                        <li class="page-item">
                                            <a class="page-link <?= $page_number == $i ? "active" : ""; ?>" href="<?= helperFunction::adminUrl("index.php?page=all-appointments&page_number=$i") ?>">
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