<?php
require_once VENDORS_PACKAGES . '/mobiledetect/mobiledetectlib/src/MobileDetect.php';

if (!class_exists('Mobile_Detect')) {
    class_alias(\Detection\MobileDetect::class, 'Mobile_Detect');
}
