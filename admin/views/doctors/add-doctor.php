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
          <h1 class="m-0">Add Doctor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $home; ?>">Home</a></li>
            <li class="breadcrumb-item active">Add Doctor</li>
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


            <div class="container">

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

              <form action="<?= helperFunction::adminUrl("index.php?page=create") ?>" method="POST" enctype="multipart/form-data" class="m-5">

                <!-- Doctor Name -->
                <div class="mb-3">
                  <label for="doctorName" class="form-label">Doctor Name</label>
                  <input type="text" class="form-control" id="doctorName" name="name">
                  <span class="text-danger"><?= Session::flash("name"); ?></span>

                </div>

                <!-- Salary -->
                <div class="mb-3">
                  <label for="doctorSalary" class="form-label">Salary</label>
                  <input type="number" class="form-control" id="doctorSalary" name="salary">
                  <span class="text-danger"><?= Session::flash("salary"); ?></span>

                </div>

                <!-- Doctor Image -->
                <div class="form-group">
                  <label for="exampleInputFile">Doctor Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="image">

                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                  <span class="text-danger"><?= Session::flash("image"); ?></span>
                </div>

                <!-- Major ID (Dropdown) -->
                <div class="form-group">
                  <label>Major</label>
                  <select class="form-control" name="major">
                    <option value="">Select Major</option>
                    <?php foreach (Database::getAll("majors") as $major) : ?>

                      <option value="<?= $major["id"]; ?>"><?= $major["major_name"] ?></option>

                    <?php endforeach; ?>
                  </select>
                  <span class="text-danger"><?= Session::flash("major"); ?></span>

                </div>

                <!-- Clinic ID (Dropdown) -->
                <div class="form-group">
                  <label>Clinic Address</label>
                  <select class="form-control" name="clinic">
                    <option value="">Select Clinic</option>
                    <?php foreach (Database::getAll("clinics") as $clinic) : ?>

                      <option value="<?= $clinic["id"] ?>"><?= $clinic["address"] ?></option>

                    <?php endforeach; ?>
                  </select>
                  <span class="text-danger"><?= Session::flash("clinic"); ?></span>

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