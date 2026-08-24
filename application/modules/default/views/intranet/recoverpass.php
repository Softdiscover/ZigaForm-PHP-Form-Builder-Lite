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

        <h1 class="zgfm-login__title"><?php echo __('Password recovery', 'FRocket_admin'); ?></h1>

        <p class="zgfm-login__message"><?php echo $message; ?></p>

        <p class="zgfm-login__back">
            <a href="<?php echo site_url(); ?>admin"><?php echo __('Back to sign in', 'FRocket_admin'); ?></a>
        </p>
    </div>
</main>
