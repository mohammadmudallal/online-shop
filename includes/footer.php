<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/custom.js"></script>
<!-- <script src="assets/js/fontawesome.js"></script> -->
<script src="assets/js/owl.carousel.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
<script>
  alertify.set('notifier', 'position', 'top-center');
  <?php if (isset($_SESSION['message'])) { ?>
    alertify.success('<?= $_SESSION['message']; ?>');
  <?php
    unset($_SESSION['message']);
  }
  ?>

</script>
</body>

</html>