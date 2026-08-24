<?php
/**
 * login
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: index.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://php-form-builder.zigaform.com/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<main class="zgfm-login">
    <div class="zgfm-login__card">
        <div class="zgfm-login__logo">
            <img src="<?php echo base_url(); ?>assets/backend/img/logo-uiform.png" alt="ZigaForm - PHP Form Builder &amp; Contact Form">
        </div>

        <h1 class="zgfm-login__title"><?php echo __('Welcome back', 'FRocket_admin'); ?></h1>
        <p class="zgfm-login__subtitle"><?php echo __('Enter your username and password', 'FRocket_admin'); ?></p>

        <?php
        // Set by MY_Security::csrf_show_error() when a login form is
        // submitted with a token older than its cookie -- a cached or
        // long-open page. Explains the bounce instead of silently
        // redisplaying the form.
        if ( $this->input->get('expired')) {
            ?>
            <div class="zgfm-login__alert zgfm-login__alert--warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo __('Close', 'FRocket_admin'); ?>">&times;</button>
                <?php echo __('Your session expired before the form was submitted. Please sign in again.', 'FRocket_admin'); ?>
            </div>
            <?php
        }
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

        <?php echo form_open('default/intranet/authenticate/', 'name="login"'); ?>
            <div class="zgfm-login__field">
                <input name="username" id="inputEmail" class="zgfm-login__input" type="text" placeholder=" " autocomplete="username" autocapitalize="none" autocorrect="off" spellcheck="false" required autofocus>
                <label class="zgfm-login__label" for="inputEmail"><?php echo __('Username', 'FRocket_admin'); ?></label>
            </div>

            <div class="zgfm-login__field zgfm-login__field--password">
                <input name="password" id="inputPassword" class="zgfm-login__input" type="password" placeholder=" " autocomplete="current-password" required>
                <label class="zgfm-login__label" for="inputPassword"><?php echo __('Password', 'FRocket_admin'); ?></label>
                <button type="button" class="zgfm-login__toggle" data-zgfm-toggle-pass="inputPassword" data-label-show="<?php echo __('Show password', 'FRocket_admin'); ?>" data-label-hide="<?php echo __('Hide password', 'FRocket_admin'); ?>" aria-controls="inputPassword" aria-pressed="false" aria-label="<?php echo __('Show password', 'FRocket_admin'); ?>">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>

            <?php if ( UIFORM_DEMO !== 1) { ?>
            <p class="zgfm-login__forgot">
                <a href="<?php echo site_url(); ?>default/intranet/recoverpass"><?php echo __('Forgot Password', 'FRocket_admin'); ?></a>
            </p>
            <?php } ?>

            <button type="submit" class="zgfm-login__submit"><?php echo __('Sign in', 'FRocket_admin'); ?></button>
        <?php echo form_close(); ?>
    </div>
</main>
