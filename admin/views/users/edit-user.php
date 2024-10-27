<?php require_once(BASE_ADMIN_PATH . "views/inc/header.php"); ?>
<?php require_once(BASE_ADMIN_PATH . "views/inc/nav.php"); ?>
<?php require_once(BASE_ADMIN_PATH . "views/inc/aside.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $home ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Edit User Information</h3>
                        </div>

                        <?php if (Session::has("error")) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                <?= Session::flash("error"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (Session::has("success")) : ?>
                            <div class="alert alert-success text-center">
                                <?= Session::flash("success") ?>
                            </div>
                        <?php endif; ?>


                        <div class="card-body">
                            <form action="<?= helperFunction::adminUrl("index.php?page=update-user"); ?>" method="POST">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user[0]['name']; ?>">
                                    <input type="hidden" name="userid" value="<?= $user[0]['id']; ?>">
                                    <span class="text-danger"><?= Session::flash("name"); ?></span>

                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user[0]['username']; ?>">
                                    <span class="text-danger"><?= Session::flash("username"); ?></span>

                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user[0]['email']; ?>">
                                    <span class="text-danger"><?= Session::flash("email"); ?></span>

                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">

                                        <option value="">Select Type</option>

                                        <option value="admin" <?= $user[0]['type'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="user" <?= $user[0]['type'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
                                    <span class="text-danger"><?= Session::flash("type"); ?></span>

                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once(BASE_ADMIN_PATH . "views/inc/footer.php"); ?>