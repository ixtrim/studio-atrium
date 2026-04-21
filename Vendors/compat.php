<?php
// Compatibility shim: legacy code uses global Mobile_Detect class name
if (!class_exists('Mobile_Detect', false)) {
    class_alias('Detection\MobileDetect', 'Mobile_Detect');
}
