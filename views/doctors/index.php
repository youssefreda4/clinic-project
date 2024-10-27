<?php require_once BASE_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_PATH . "views/inc/direction.php"; ?>

<div class="page-wrapper">
    <div class="container">

        <div class="doctors-grid">

            <?php foreach ($doctors as $doctor): ?>
                <div class="card p-2" style="width: 18rem;">
                    <img src="<?= helperFunction::url("database/uploads/" . $doctor["image"]); ?>" class="card-img-top "
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?= $doctor["name"]; ?></h4>
                        <h6 class="card-title fw-bold text-center"><?= $doctor["major_name"]; ?></h6>
                        <a href="<?= helperFunction::url("index.php?page=booking&doctor_id=" . $doctor["id"]); ?>" class="btn btn-outline-primary card-button">Book an
                            appointment</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <?php if (!isset($major_id)) : ?>
            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <?php $currnt_page = $_GET["page_number"] ?? 0; ?>
                        <a class="page-link page-prev" href="<?= helperFunction::url("index.php?page=doctors&page_number=" . --$currnt_page)  ?>" aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <?php for ($i = 0; $i < $page_numbers; $i++): ?>
                        <li class="page-item"><a class="page-link <?= $page_number == $i ? "active" : ""; ?>" href="<?= helperFunction::url("index.php?page=doctors&page_number=$i") ?>"><?= $i + 1 ?></a></li>
                    <?php endfor; ?>

                    <li class="page-item">
                        <a class="page-link page-next" href="<?= helperFunction::url("index.php?page=doctors&page_number=" . ++$page_number) ?>" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php endif ?>
    </div>
</div>

<?php require_once BASE_PATH . "views/inc/footer.php"; ?>