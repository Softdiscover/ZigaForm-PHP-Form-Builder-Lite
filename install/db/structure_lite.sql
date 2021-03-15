
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `fbcf_uiform_fields`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_fields`;
CREATE TABLE `fbcf_uiform_fields` (
  `fmf_id` int(10) NOT NULL AUTO_INCREMENT,
  `fmf_uniqueid` varchar(255) DEFAULT NULL,
  `fmf_data` longtext,
  `fmf_fieldname` varchar(255) DEFAULT NULL,
  `flag_status` smallint(5) DEFAULT NULL,
  `created_date` timestamp NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `fmf_status_qu` smallint(5) NOT NULL DEFAULT '0',
  `type_fby_id` int(6) NOT NULL,
  `form_fmb_id` int(10) NOT NULL,
  `order_frm` smallint(5) DEFAULT NULL,
  `order_rec` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`fmf_id`,`form_fmb_id`)
) DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_fields
-- ----------------------------

-- ----------------------------
-- Table structure for `fbcf_uiform_fields_type`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_fields_type`;
CREATE TABLE `fbcf_uiform_fields_type` (
  `fby_id` int(6) NOT NULL AUTO_INCREMENT,
  `fby_name` varchar(25) DEFAULT NULL,
  `flag_status` smallint(5) DEFAULT NULL,
  `created_date` timestamp NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`fby_id`)
) AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_fields_type
-- ----------------------------
INSERT INTO `fbcf_uiform_fields_type` VALUES ('1', '1 Col', '1', '1980-01-01 00:00:01', '2014-05-24 01:10:27', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('2', '2 Cols', '1', '1980-01-01 00:00:01', '2014-05-24 01:10:44', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('3', '3 Cols', '1', '1980-01-01 00:00:01', '2014-05-24 01:10:57', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('4', '4 Cols', '1', '1980-01-01 00:00:01', '2014-05-24 01:11:36', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('5', '6 Cols', '1', '1980-01-01 00:00:01', '2014-05-24 01:11:45', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('6', 'Textbox', '1', '1980-01-01 00:00:01', '2014-05-24 01:11:58', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('7', 'Textarea', '1', '1980-01-01 00:00:01', '2014-05-24 01:12:12', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('8', 'Radio Button', '1', '1980-01-01 00:00:01', '2014-05-24 01:13:21', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('9', 'Checkbox', '1', '1980-01-01 00:00:01', '2014-05-24 01:13:33', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('10', 'Select', '1', '1980-01-01 00:00:01', '2014-05-24 01:13:44', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('11', 'Multiple Select', '1', '1980-01-01 00:00:01', '2014-05-24 01:13:57', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('12', 'File Upload', '1', '1980-01-01 00:00:01', '2014-05-24 01:28:55', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('13', 'Image Upload', '1', '1980-01-01 00:00:01', '2014-05-24 01:29:06', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('14', 'Custom HTML', '1', '1980-01-01 00:00:01', '2014-05-24 01:29:31', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('15', 'Password', '1', '1980-01-01 00:00:01', '2014-05-24 01:30:39', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('16', 'Slider', '1', '1980-01-01 00:00:01', '2014-05-24 01:30:53', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('17', 'Range', '1', '1980-01-01 00:00:01', '2014-05-24 01:35:41', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('18', 'Spinner', '1', '1980-01-01 00:00:01', '2014-05-24 01:37:09', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('19', 'Captcha', '1', '1980-01-01 00:00:01', '2014-05-24 01:37:19', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('20', 'Submit button', '1', '1980-01-01 00:00:01', '2014-05-24 01:39:59', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('21', 'Hidden field', '1', '1980-01-01 00:00:01', '2014-05-24 01:40:13', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('22', 'Star rating', '1', '1980-01-01 00:00:01', '2014-05-24 01:40:24', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('23', 'Color Picker', '1', '1980-01-01 00:00:01', '2014-05-24 01:40:37', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('24', 'Date Picker', '1', '1980-01-01 00:00:01', '2014-05-24 01:41:19', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('25', 'Time Picker', '1', '1980-01-01 00:00:01', '2014-05-24 01:41:46', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('26', 'Date and Time', '1', '1980-01-01 00:00:01', '2014-05-24 01:50:36', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('27', 'ReCaptcha', '1', '1980-01-01 00:00:01', '2014-05-24 01:50:53', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('28', 'Prepended text\r\n', '1', '1980-01-01 00:00:01', '2014-05-24 01:51:16', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('29', 'Appended text\r\n', '1', '1980-01-01 00:00:01', '2014-05-24 01:51:38', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('30', 'Append and prepend\r\n', '1', '1980-01-01 00:00:01', '2014-05-24 01:51:55', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('31', 'Panel', '1', '1980-01-01 00:00:01', '2014-05-24 01:55:32', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('32', 'Divider', '1', '1980-01-01 00:00:01', '2014-05-24 01:58:58', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('33', 'Heading 1', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('34', 'Heading 2', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('35', 'Heading 3', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('36', 'Heading 4', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('37', 'Heading 5', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('38', 'Heading 6', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('39', 'Wizard buttons', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('40', 'Switch', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('41', 'Dinamic Checkbox', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('42', 'Dinamic RadioButton', '1', '1980-01-01 00:00:01', '2014-05-24 02:25:51', null, null, null, null);
INSERT INTO `fbcf_uiform_fields_type` VALUES ('43', 'Date 2', '1', '1980-01-01 00:00:01', '2018-10-11 14:10:35', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for `fbcf_uiform_form`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_form`;
CREATE TABLE `fbcf_uiform_form` (
  `fmb_id` int(10) NOT NULL AUTO_INCREMENT,
  `fmb_data` longtext,
  `fmb_name` VARCHAR(255) DEFAULT NULL,
  `fmb_html` longtext,
  `fmb_html_backend` longtext,
  `flag_status` smallint(5) DEFAULT '1',
  `created_date` timestamp NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `fmb_html_css` longtext,
  `fmb_default` tinyint(1) DEFAULT '0',
  `fmb_skin_status` tinyint(1) DEFAULT '0',
  `fmb_skin_data` longtext,
  `fmb_skin_type` smallint(5) DEFAULT '1',
  `fmb_data2` longtext,
    `fmb_rec_tpl_html` longtext NULL ,
    `fmb_rec_tpl_st` TINYINT(1) NULL DEFAULT 0 ,
  PRIMARY KEY (`fmb_id`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_form
-- ----------------------------

-- ----------------------------
-- Table structure for `fbcf_uiform_form_records`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_form_records`;
CREATE TABLE `fbcf_uiform_form_records` (
  `fbh_id` int(6) NOT NULL AUTO_INCREMENT,
  `fbh_data` longtext,
  `fbh_data_rec` longtext,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `flag_status` smallint(5) DEFAULT '1',
  `fbh_data_user` longtext,
  `form_fmb_id` int(10) NOT NULL,
  `fbh_data_rec_xml` longtext,
  `fbh_user_agent` text,
  `fbh_page` text,
  `fbh_referer` text,
  `fbh_params` longtext,
  `fbh_error` longtext,
  PRIMARY KEY (`fbh_id`)
) DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_form_records
-- ----------------------------

-- ----------------------------
-- Table structure for `fbcf_uiform_settings`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_settings`;
CREATE TABLE `fbcf_uiform_settings` (
  `version` varchar(10) DEFAULT NULL,
  `type_email` smallint(1) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` smallint(6) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_conn` varchar(255) DEFAULT NULL,
  `sendmail_path` varchar(255) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(250) DEFAULT NULL,
  `admin_mail` varchar(250) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT '1980-01-01 00:00:01',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_settings
-- ----------------------------
INSERT INTO `fbcf_uiform_settings` VALUES ('5.2.8', '1', '', '0', '', '','', '/usr/sbin/sendmail', 'en', '1', 'Company name', 'user@testexample.com', '2016-02-09 00:38:01', '1980-01-01 00:00:01');

-- ----------------------------
-- Table structure for `fbcf_uiform_user`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_user`;
CREATE TABLE `fbcf_uiform_user` (
  `use_id` int(6) NOT NULL AUTO_INCREMENT,
  `use_login` varchar(250) DEFAULT NULL,
  `use_password` varchar(32) DEFAULT NULL,
  `flag_status` smallint(5) DEFAULT NULL,
  `created_date` timestamp NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `use_password_token` varchar(32) DEFAULT NULL,
  `use_mail` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`use_id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_user
-- ----------------------------
INSERT INTO `fbcf_uiform_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2016-01-21 21:31:30', '2016-02-09 05:36:55', null, '127.0.0.1', null, '1', '', 'user@testexample.com');

-- ----------------------------
-- Table structure for `fbcf_uiform_visitor`
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_visitor`;
CREATE TABLE `fbcf_uiform_visitor` (
  `vis_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vis_uniqueid` varchar(10) DEFAULT NULL,
  `vis_user_agent` varchar(200) DEFAULT NULL,
  `vis_page` text,
  `vis_referer` text,
  `vis_ip` text,
  `vis_last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vis_params` text,
  `vis_error` text,
  PRIMARY KEY (`vis_id`)
) DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fbcf_uiform_visitor
-- ----------------------------
DROP TABLE IF EXISTS `fbcf_uiform_form_log`;
CREATE TABLE `fbcf_uiform_form_log` (
  `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `log_frm_data` longtext,
  `log_frm_name` varchar(255) DEFAULT NULL,
  `log_frm_html` longtext,
  `log_frm_html_backend` longtext,
  `log_frm_html_css` longtext,
  `log_frm_id` int(10) NOT NULL,
  `log_frm_hash` varchar(255) NOT NULL,
  `flag_status` smallint(5) DEFAULT '1',
  `created_date` timestamp NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(100) DEFAULT NULL,
  `updated_ip` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `fbcf_uiform_addon`;
CREATE TABLE `fbcf_uiform_addon` (
    `add_name` varchar(45) NOT NULL DEFAULT '',
    `add_title` text ,
    `add_info` text ,
    `add_system` smallint(5) DEFAULT NULL,
    `add_hasconfig` smallint(5) DEFAULT NULL,
    `add_version` varchar(45)  DEFAULT NULL,
    `add_icon` text ,
    `add_installed` smallint(5) DEFAULT NULL,
    `add_order` int(5) DEFAULT NULL,
    `add_params` longtext,
    `add_log` longtext,
    `addonscol` varchar(45) DEFAULT NULL,
    `flag_status` smallint(5)  DEFAULT 1,
    `created_date` timestamp NULL,
    `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_ip` varchar(100)  DEFAULT NULL,
    `updated_ip` varchar(100)  DEFAULT NULL,
    `created_by` varchar(100) DEFAULT NULL,
    `updated_by` varchar(100) DEFAULT NULL,
    `add_xml` longtext,
    `add_load_back` smallint(5) DEFAULT NULL,
    `add_load_front` smallint(5) DEFAULT NULL,
    `is_field` smallint(5) DEFAULT NULL,
    PRIMARY KEY (`add_name`) 
) DEFAULT CHARSET=utf8;

INSERT INTO `fbcf_uiform_addon` VALUES ('func_anim', 'Animation effect', 'You can animate your fields adding many animation effects. Also you can set up the delay and other options.', 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, '1980-01-01 00:00:01', '2018-01-31 10:35:14', NULL, NULL, NULL, NULL, NULL, 1, 1, 1);
INSERT INTO `fbcf_uiform_addon` VALUES ('webhook', 'WebHooks Add-On', 'You can use the WebHooks Add-On to send data from your forms to any custom page or script you like. This page can perform integration tasks to transform, parse, manipulate and send your submission data to wherever you choose. If you are developing an application that needs to be updated every time a form is submitted, WebHooks is for you. The advantage of WebHooks is that the passing of data is immediate and you can pass all submitted form data at once. e.g. you can connect with Webhook of Zapier - https%3A%2F%2Fzapier.com%2Fpage%2Fwebhooks%2F', 1, 1, NULL, NULL, 1, 2, NULL, NULL, NULL, 0, '2019-12-30 01:36:23', '2019-12-30 01:34:27', NULL, NULL, NULL, NULL, NULL, 1, 1, 0);
INSERT INTO `fbcf_uiform_addon` VALUES ('mgtranslate', 'Translation Manager Add-on', 'Translate any text on zigaform, and add new language', 1, 1, '1.0', NULL, 0, 4, '{\"required_wp\":5.0,\"required_php\":7.2}', NULL, NULL, 0, '2020-09-26 12:13:06', '2020-09-26 12:12:40', NULL, NULL, NULL, NULL, '<?xml version=\"1.0\"?> <params><required_wp>5.0</required_wp><required_php>7.2</required_php></params>', 1, 0, 0);


DROP TABLE IF EXISTS `fbcf_uiform_addon_details`;
CREATE TABLE `fbcf_uiform_addon_details` (
    `add_name` varchar(45)  NOT NULL,
    `fmb_id` int(10) NOT NULL,
    `adet_data` longtext ,
    `flag_status` smallint(5) DEFAULT 1,
    `created_date` timestamp NULL,
    `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_ip` varchar(100) DEFAULT NULL,
    `updated_ip` varchar(100) DEFAULT NULL,
    `created_by` varchar(100) DEFAULT NULL,
    `updated_by` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`add_name`, `fmb_id`) 
) DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `fbcf_uiform_addon_details_log`;
CREATE TABLE `fbcf_uiform_addon_details_log` (
    `add_log_id` bigint(20) NOT NULL AUTO_INCREMENT,
    `add_name` varchar(45)  NOT NULL,
    `fmb_id` int(10) NOT NULL,
    `adet_data` longtext  NULL,
    `flag_status` smallint(5) DEFAULT 1,
    `created_date` timestamp NULL,
    `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_ip` varchar(100) DEFAULT NULL,
    `updated_ip` varchar(100) DEFAULT NULL,
    `created_by` varchar(100) DEFAULT NULL,
    `updated_by` varchar(100) DEFAULT NULL,
    `log_id` int(5) NOT NULL,
    PRIMARY KEY (`add_log_id`) 
) DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `fbcf_uiform_options`;
CREATE TABLE `fbcf_uiform_options`  (
  `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `option_value` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `autoload` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`) USING BTREE,
  UNIQUE INDEX `option_name`(`option_name`) USING BTREE
) DEFAULT CHARSET=utf8;
