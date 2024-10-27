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
                    <h1 class="m-0">All Users</h1>

                    <!-- Search -->
                    <div class="container mt-4 ">
                        <form class="d-flex" action="<?= helperFunction::adminUrl("index.php?page=search-user"); ?>" method="POST">
                            <input class="form-control me-2" type="search" placeholder="User Id" name="user_id">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                        <span class="text-danger"><?= Session::flash("error"); ?></span>
                    </div>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $home; ?>">Home</a></li>
                        <li class="breadcrumb-item active">All Users</li>
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
                                        <th class="text-center">Usrname</th>
                                        <th class="text-center">email</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Created_at</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <th class="text-center"><?= $user["id"] ?></th>
                                            <th class="text-center"><?= $user["name"]; ?></th>
                                            <th class="text-center"><?= $user["username"]; ?></th>
                                            <th class="text-center"><?= $user["email"]; ?></th>
                                            <th class="text-center"><?= $user["type"]; ?></th>
                                            <th class="text-center"><?= $user["created_at"]; ?></th>

                                            <th class="text-center">
                                                <a href="<?= helperFunction::adminUrl("index.php?page=edit-user&id=".$user["id"]) ; ?>" class="btn btn-info ">Edit</a>
                                            </th>

                                            <th class="text-center">
                                                <a href="<?= helperFunction::adminUrl("index.php?page=delete-user&id=".$user["id"]) ; ?>" class="btn btn-danger">Delete</a>
                                            </th>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <?php if (!isset($user_id)) : ?>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination justify-content-center">
                                    <?php for ($i = 0; $i < $page_numbers; $i++): ?>
                                        <li class="page-item">
                                            <a class="page-link <?= $page_number == $i ? "active" : ""; ?>" href="<?= helperFunction::adminUrl("index.php?page=users&page_number=$i") ?>">
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