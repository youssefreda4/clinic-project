<?php require_once BASE_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_PATH . "views/inc/direction.php"; ?>

<div class="container">
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <br>

        <?php if (Session::get("error")): ?>
            <div class="alert alert-danger">
                <?= Session::flash("error"); ?>
            </div>
        <?php endif; ?>

        <form action="<?= helperFunction::url("index.php?page=handel-register"); ?>" method="POST">
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                    <span class="text-danger"><?= Session::flash("name"); ?></span>
                </div>

                <div class="mb-3">
                    <label class="form-label required-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" >
                    <span class="text-danger"><?= Session::flash("username"); ?></span>
                </div>

                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" >
                    <span class="text-danger"><?= Session::flash("email"); ?></span>
                </div>

                <div class="mb-3">
                    <label class="form-label required-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                    <span class="text-danger"><?= Session::flash("password"); ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>
        <div class="d-flex justify-content-center gap-2">
            <span>already have an account?</span><a class="link" href="<?= helperFunction::url("index.php?page=login"); ?>"> login</a>
        </div>

        <br>
    </div>
</div>
<?php require_once BASE_PATH . "views/inc/footer.php"; ?>