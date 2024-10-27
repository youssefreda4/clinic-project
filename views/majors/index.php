<?php require_once BASE_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_PATH . "views/inc/direction.php"; ?>

<div class="container">


    <div class="majors-grid">
        <?php foreach ($majors as $major): ?>
            <div class="card p-2" style="width: 18rem;">
                <img src="<?= helperFunction::url("assets/images/major.jpg"); ?>" class="card-img-top rounded-circle card-image-circle"
                    alt="major">
                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                    <h4 class="card-title fw-bold text-center"><?= $major["major_name"] ?></h4>
                    <a href="<?= helperFunction::url("index.php?page=doctors&major_id=" . $major["id"]); ?>" class="btn btn-outline-primary card-button">Browse Doctors</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <nav class="mt-5" aria-label="navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
            <?php $currnt_page = $_GET["page_number"] ?? 0 ; ?>
                <a class="page-link page-prev" href="<?= helperFunction::url("index.php?page=majors&page_number=". --$currnt_page ); ?>" aria-label="Previous">
                    <span aria-hidden="true">
                        < </span>
                </a>
            </li>

            <?php for ($i = 0; $i < $page_numbers; $i++): ?>
                <li class="page-item"><a class="page-link <?= $page_number == $i ? "active" : ""; ?>" href="<?= helperFunction::url("index.php?page=majors&page_number=$i") ?>"><?= $i + 1 ?></a></li>
            <?php endfor; ?>

            <li class="page-item">
                <a class="page-link page-next" href="<?= helperFunction::url("index.php?page=majors&page_number=" . ++$page_number) ?>" aria-label="Next">
                    <span aria-hidden="true"> > </span>
                </a>
            </li>
        </ul>
    </nav>




</div>
</div>
<?php require_once BASE_PATH . "views/inc/footer.php"; ?>