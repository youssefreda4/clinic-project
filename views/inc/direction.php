<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="<?= helperFunction::url("index.php?page=$dirction"); ?>"><?= $dirction ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $page_name; ?></li>
    </ol>
</nav>