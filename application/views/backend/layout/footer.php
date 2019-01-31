        <footer class="footer">
            © 2018 Suan Dusit University
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>public/admin/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url();?>public/admin/vendor/popper/popper.min.js"></script>
    <script src="<?php echo base_url();?>public/admin/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>public/admin/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>public/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>public/admin/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url();?>public/admin/vendor/toastr/toastr.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>public/admin/js/custom.min.js"></script>
     <!-- Custom scripts for this page--> 
    <?php if(isset($js_scripts)) foreach ($js_scripts as $js_script):?>
    <script type="text/javascript" src="<?php echo base_url("public/admin/$js_script.js")?>"></script>
    <?php endforeach;?>

     <script type="text/javascript">
    $(document).ready(function(){
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.options.timeOut = 3000;
        toastr.options.preventDuplicates = true;
        toastr.options.positionClass = "toast-bottom-right";
    });

</script>

</body>

</html>