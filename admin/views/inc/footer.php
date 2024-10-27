  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date("Y"); ?> <a href="<?= $home; ?>">vcare</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= helperFunction::adminUrl("assets/plugins/jquery/jquery.min.js"); ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= helperFunction::adminUrl("assets/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= helperFunction::adminUrl("assets/dist/js/adminlte.min.js"); ?>"></script>
  </body>

  </html>