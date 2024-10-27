<?php require_once BASE_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_PATH . "views/inc/direction.php"; ?>



<div class="container">
    <h2 class="mt-4">Your Appointments</h2>
    <div class="card p-4 mt-3">
        <?php if (count($patients) ) : ?>

            <?php foreach ($patients as $patient) : ?>

                <div class="card p-4 mt-3">
                    <div class="d-flex gap-3 align-items-center">
                        <div>
                            <h4 class="fw-bold"><?= $patient["doctor_name"]; ?></h4>
                            <p><strong>Major:</strong> <?= $patient["major_name"]; ?></p>
                        </div>
                    </div>

                    <div class="mt-3 alert alert-info">
                        <h5 class="text-center">Your appointment is : <?= $patient["appointment_date"]; ?></h5>
                        <p class="text-center">
                            <strong>Clinic Address:</strong> <?= $patient["address"]; ?>
                        </p>
                    </div>

                    <div class="mt-3">
                        <h5>Contact Information:</h5>
                        <p><strong>Name:</strong> <?= $patient["name"]; ?> </p>
                        <p><strong>Phone:</strong> 0<?= $patient["phone"]; ?></p>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else : ?>

            <div class="alert alert-info text-center" role="alert">
                No appointments found
            </div>

        <?php endif; ?>
    </div>

</div>