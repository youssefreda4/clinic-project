<div class="page-wrapper">
    <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="fw-bold text-white m-0 text-decoration-none h3" href="<?= helperFunction::url("index.php?page=home"); ?>">VCare</a>
            </div>
            <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                    <a type="button" class="btn btn-outline-light navigation--button <?= helperFunction::activelink(["home"]) ?>"
                        href="<?= helperFunction::url("index.php?page=home"); ?>">Home</a>
                    <a type="button" class="btn btn-outline-light navigation--button <?= helperFunction::activelink(["majors"]) ?>"
                        href="<?= helperFunction::url("index.php?page=majors"); ?>">Majors</a>
                    <a type="button" class="btn btn-outline-light navigation--button <?= helperFunction::activelink(["doctors"]) ?>"
                        href="<?= helperFunction::url("index.php?page=doctors"); ?>">Doctors</a>
                    <?php if (!Session::get("userid")): ?>
                        <a type="button" class="btn btn-outline-light navigation--button <?= helperFunction::activelink(["login"]) ?>"
                            href="<?= helperFunction::url("index.php?page=login"); ?>">Login</a>
                    <?php else: ?>
                        <a type="button" class="btn btn-outline-light navigation--button  <?= helperFunction::activelink(["appointments"]) ?>"
                            href="<?= helperFunction::url("index.php?page=appointments"); ?>">Appointments</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="<?= helperFunction::url("index.php?page=logout"); ?>">Logout</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>