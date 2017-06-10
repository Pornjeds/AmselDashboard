<script>
  $("#customer-list").select2();

  $(document).ready(function() {
      $('#dataTables-customer-data').DataTable({
          responsive: true
      });
  });

  function validateForm() {
    var customerid = $("#customer-list").val();
    if (customerid == "0") {
        alert("กรุณาเลือกร้าน");
        return false;
    }
}
</script>
