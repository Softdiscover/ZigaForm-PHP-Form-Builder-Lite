<?php
/**
 * login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Universal_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v1.20 2014-04-28 02:52:40 Softdiscover $
 * @link      http://universal-form-builder.softdiscover.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<main class="zgfm-login">
    <div class="zgfm-login__card">
        <div class="zgfm-login__logo">
            <img src="<?php echo base_url(); ?>assets/backend/img/logo-uiform.png" alt="uiForm - Universal Form Builder">
        </div>

        <h1 class="zgfm-login__title"><?php echo __('Change password', 'FRocket_admin'); ?></h1>
        <p class="zgfm-login__subtitle"><?php echo __('Choose a new password for your account', 'FRocket_admin'); ?></p>

        <?php
        if ( $this->session->flashdata('message')) {
            $resp = explode(':', $this->session->flashdata('message'));
            ?>
            <div class="zgfm-login__alert zgfm-login__alert--<?php echo trim($resp[0]); ?>" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo __('Close', 'FRocket_admin'); ?>">&times;</button>
                <?php echo $resp[1]; ?>
            </div>
            <?php
        }
        ?>

        <?php echo form_open('default/intranet/processchangepassword/?', 'name="login" id="zgfm-changepass-form"'); ?>
            <div class="zgfm-login__field">
                <input name="username" id="inputEmail" class="zgfm-login__input" type="text" value="<?php echo $use_login; ?>" placeholder=" " autocomplete="username" readonly>
                <label class="zgfm-login__label" for="inputEmail"><?php echo __('Username', 'FRocket_admin'); ?></label>
            </div>

            <div class="zgfm-login__field zgfm-login__field--password">
                <input name="password" id="inputPassword" class="zgfm-login__input" type="password" placeholder=" " autocomplete="new-password" required>
                <label class="zgfm-login__label" for="inputPassword"><?php echo __('Password', 'FRocket_admin'); ?></label>
                <input name="pass_token" type="hidden" value="<?php echo $pass_token; ?>">
                <button type="button" class="zgfm-login__toggle" data-zgfm-toggle-pass="inputPassword" data-label-show="<?php echo __('Show password', 'FRocket_admin'); ?>" data-label-hide="<?php echo __('Hide password', 'FRocket_admin'); ?>" aria-controls="inputPassword" aria-pressed="false" aria-label="<?php echo __('Show password', 'FRocket_admin'); ?>">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>

            <div class="zgfm-login__field zgfm-login__field--password">
                <input name="cpassword" id="inputPassword2" class="zgfm-login__input" type="password" placeholder=" " autocomplete="new-password" required>
                <label class="zgfm-login__label" for="inputPassword2"><?php echo __('Confirm Password', 'FRocket_admin'); ?></label>
                <button type="button" class="zgfm-login__toggle" data-zgfm-toggle-pass="inputPassword2" data-label-show="<?php echo __('Show password', 'FRocket_admin'); ?>" data-label-hide="<?php echo __('Hide password', 'FRocket_admin'); ?>" aria-controls="inputPassword2" aria-pressed="false" aria-label="<?php echo __('Show password', 'FRocket_admin'); ?>">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>

            <div class="zgfm-login__alert zgfm-login__alert--error" id="zgfm-changepass-error" role="alert" style="display:none;">
                <?php echo __('Password not matches', 'FRocket_admin'); ?>
            </div>

            <button type="submit" class="zgfm-login__submit"><?php echo __('Update password', 'FRocket_admin'); ?></button>
        <?php echo form_close(); ?>
    </div>
</main>

<script type="text/javascript">
// Inline mismatch notice instead of the old blocking alert().
(function () {
	var form = document.getElementById('zgfm-changepass-form');
	if ( ! form) {
		return;
	}
	form.addEventListener('submit', function (event) {
		var pass = document.getElementById('inputPassword');
		var confirmPass = document.getElementById('inputPassword2');
		var error = document.getElementById('zgfm-changepass-error');
		if (pass.value === confirmPass.value) {
			error.style.display = 'none';
			return;
		}
		event.preventDefault();
		error.style.display = 'block';
		confirmPass.focus();
	});
})();
</script>
