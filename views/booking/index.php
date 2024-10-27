<?php require_once BASE_PATH . "views/inc/header.php"; ?>
<?php require_once BASE_PATH . "views/inc/nav.php"; ?>
<?php require_once BASE_PATH . "views/inc/direction.php"; ?>

<div class="container">
  <div class="d-flex flex-column gap-3 details-card doctor-details">
    <div class="details d-flex gap-2 align-items-center">
      
      <?php foreach ($doctor as $detail) : ?>
        <img
          src="<?= helperFunction::url("database/uploads/".$detail["image"]); ?>"
          alt="doctor"
          width="150" />
        <div class="details-info d-flex flex-column gap-3">
          <h4 class="card-title fw-bold"><?= $detail["name"] ?></h4>
          <h6 class="card-title fw-bold">
            doctor major : <?= $detail["major_name"] ?>
          </h6>
        </div>
      <?php endforeach; ?>

    </div>

    <?php if (Session::has("success")): ?>
      <div class="alert alert-success text-center">
        <?= Session::flash("success") ?>

        <h3>Your appointment with the doctor is scheduled for : <?= Session::flash("date") ?>. </h3>
        <h5>Clinic address : <?= Session::flash("address") ?>. </h5>
      </div>
    <?php endif; ?>
    <hr />

    <?php if (Session::has("userid")) : ?>

      <form action="<?= helperFunction::url("index.php?page=handel-booking") ?>" method="POST">
        <div class="form-items">
          <div class="mb-3">
            <label class="form-label required-label" for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" />
            <input type="hidden" name="doctor_id" value="<?= $doctor_id; ?>" />
            <span class="text-danger"><?= Session::flash("name"); ?></span>
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="phone">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" />
            <span class="text-danger"><?= Session::flash("phone"); ?></span>
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" />
            <span class="text-danger"><?= Session::flash("email"); ?></span>
          </div>



          <div class="col-md-12 mb-3">
            <label class="form-label required-label" for="email">Clinic Address</label>
            <select name="clinic_id" class="form-select">
              <option value="">Select Address</option>
              <?php foreach ($addresses as $address) : ?>
                <option value="<?= $address["id"]; ?>"><?= $address["address"]; ?></option>
              <?php endforeach; ?>
            </select>
            <span class="text-danger"><?= Session::flash("email"); ?></span>
          </div>


        </div>
        <button type="submit" class="btn btn-primary">
          Confirm Booking
        </button>
      </form>
    <?php else: ?>
      <!-- Message for users who are not logged in -->
      <div class="alert alert-warning text-center">
        You must log in to book an appointment.
        <a href="<?= helperFunction::url('index.php?page=login'); ?>" class="btn btn-secondary mt-2">Login</a>
      </div>
    <?php endif; ?>
  </div>
</div>
</div>

<?php require_once BASE_PATH . "views/inc/footer.php"; ?>

<script>
  const stars = document.querySelectorAll(".star");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      const isActive = star.classList.contains("active");
      if (isActive) {
        star.classList.remove("active");
      } else {
        star.classList.add("active");
      }
      for (let i = 0; i < index; i++) {
        stars[i].classList.add("active");
      }
      for (let i = index + 1; i < stars.length; i++) {
        stars[i].classList.remove("active");
      }
    });
  });
</script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
  integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"></script>
</body>

</html>