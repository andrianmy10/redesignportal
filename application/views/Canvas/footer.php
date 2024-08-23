<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">

  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<!-- endinject -->
<!-- Plugin js for this page -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get all elements with the attribute data-date
    const dateElements = document.querySelectorAll('[data-date]');

    dateElements.forEach(function(element) {
        // Get the date value from the data attribute
        let dateValue = element.getAttribute('data-date');

        // Create a new Date object from the dateValue
        let date = new Date(dateValue);

        // Define the month names in Indonesian
        const monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Format the date to DD MMMM YYYY
        let formattedDate = date.getDate() + ' ' + monthNames[date.getMonth()] + ' ' + date.getFullYear();

        // Set the formatted date back to the element
        element.textContent = formattedDate;
    });
  });
</script>
<script src="<? echo base_url('assets/plugins/adminarea/template/vendors/chart.js/Chart.min.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/vendors/progressbar.js/progressbar.min.js'); ?>"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<? echo base_url('assets/plugins/adminarea/template/js/off-canvas.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/js/hoverable-collapse.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/js/template.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/js/settings.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/js/todolist.js'); ?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<? echo base_url('assets/plugins/adminarea/template/js/dashboard.js'); ?>"></script>
<script src="<? echo base_url('assets/plugins/adminarea/template/js/Chart.roundedBarCharts.js'); ?>"></script>
<!-- End custom js for this page -->
</body>

</html>
