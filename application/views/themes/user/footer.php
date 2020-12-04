<script src="<?= base_url("assets/user/js/jquery.min.js")?>"></script>
   <script src="https://unpkg.com/@popperjs/core@2"></script>
   <script src="<?= base_url("assets/user/js/bootstrap.bundle.min.js")?>"></script>
   <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/user/date/dist/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHightlight: true,
            });
        });

        
    </script>
</body>

</html>