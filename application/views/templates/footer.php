</div>

<script src="<?= base_url();?>js/jquery.min.js"></script>
<script src="<?= base_url();?>js/popper.min.js"></script>

<script src="<?= base_url();?>js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url();?>js/sweetalert.min.js"></script>
<script src="<?= base_url();?>js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
	$(".btn-delete").on('click', function(){
      var url = $(this).data('url');
      var self = $(this)
      Swal.fire({
        title: 'Are you sure you want to delete this song?',
        text: "You can't undo this action.",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Proceed`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = url
        }
      });
    });
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
</body>
</html>
