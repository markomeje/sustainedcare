<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="<?= PUBLIC_URL; ?>/jquery/jquery.min.js" type="text/javascript"></script>
<!-- popper JS -->
<script src="<?= PUBLIC_URL; ?>/bootstrap/popper.min.js" type="text/javascript"></script>
<!-- Bootstrap JS -->
<script src="<?= PUBLIC_URL; ?>/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<!-- aos-->
<script src="<?= PUBLIC_URL; ?>/aos/aos.js" type="text/javascript"></script>
<!-- JQUERY CONFIRM BOX -->
<script src="<?= PUBLIC_URL; ?>/jquery/jquery.confirm.js" type="text/javascript"></script>
<!-- slips -->
<script src="<?= PUBLIC_URL; ?>/jquery/slips.js" type="text/javascript"></script>
<!-- CLIPBOARD JS -->
<script src="<?= PUBLIC_URL; ?>/js/clipboard.min.js" type="text/javascript"></script>
<!-- donate-->
<script src="<?= PUBLIC_URL; ?>/jquery/donate.js" type="text/javascript"></script>
<!-- withdrawals-->
<script src="<?= PUBLIC_URL; ?>/jquery/withdrawals.js" type="text/javascript"></script>
<!-- applicants-->
<script src="<?= PUBLIC_URL; ?>/jquery/applicants.js" type="text/javascript"></script>
<!-- password-->
<script src="<?= PUBLIC_URL; ?>/jquery/password.js" type="text/javascript"></script>
<!-- USER LOGIN -->
<script src="<?= PUBLIC_URL; ?>/jquery/login.js" type="text/javascript"></script> 
<!-- general-->
<script src="<?= PUBLIC_URL; ?>/jquery/general.js" type="text/javascript"></script>
<!-- banks-->
<script src="<?= PUBLIC_URL; ?>/jquery/banks.js" type="text/javascript"></script>
<!-- payments-->
<script src="<?= PUBLIC_URL; ?>/jquery/payments.js" type="text/javascript"></script>
<!-- contact-->
<script src="<?= PUBLIC_URL; ?>/jquery/contact.js" type="text/javascript"></script>
<!-- CLIPBOARD INITIALIZE -->
<script type="text/javascript">
    var copy = document.querySelectorAll('.copy');
    var clipboard = new ClipboardJS(copy);
    clipboard.on('success', function() { 
        alert('Copied');
    });
    clipboard.on('error', function() { 
        alert('Error');
    });
</script>
</body>
</html>
<?php ob_end_flush(); ?>
