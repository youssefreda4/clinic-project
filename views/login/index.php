<?php require_once BASE_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_PATH . "views/inc/direction.php"; ?>

<div class="container">
    <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
        <br>
        <?php if (Session::get("error")): ?>
            <div class="alert alert-danger text-center">
                <?= Session::flash("error"); ?>
            </div>
        <?php endif; ?>

        <form action="<?= helperFunction::url("index.php?page=handel-login") ?>" method="POST">

            <div class="mb-3">
                <label class="form-label required-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <span class="text-danger"><?= Session::flash("email"); ?></span>

            </div>
            <div class="mb-3">
                <label class="form-label required-label" for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger"><?= Session::flash("password"); ?></span>

            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
            <span>don't have an account?</span><a class="link" href="<?= helperFunction::url("index.php?page=register"); ?>">create account</a>
        </div>
        <br>
    </div>

</div>

<?php require_once BASE_PATH . "views/inc/footer.php"; ?>