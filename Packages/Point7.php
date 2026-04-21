<?php
/**
 * Point7 framework shim — main loader.
 * Usage: Point7::load('WebApp');  Point7::load('AbstractDAO');
 */
class Point7
{
    private static string $baseDir = '';

    public static function load(string $component): void
    {
        self::$baseDir = self::$baseDir ?: __DIR__;

        $map = [
            'WebApp'      => [
                'Point7_WebApp',
                'Point7_WebApp_Session',
                'Point7_WebApp_Cache_File',
                'Point7_Log_PEARWrapper',
                'Point7_WebApp_Request',
                'Point7_WebApp_Request_Filtered',
                'Point7_WebApp_Request_JSON',
                'Point7_WebApp_Context_Application',
                'Point7_WebApp_Context_Response',
                'Point7_WebApp_Module_Abstract',
                'Point7_WebApp_Command_Abstract',
                'Point7_WebApp_View_Smarty3_Wrapper',
            ],
            'AbstractDAO' => [
                'Point7_AbstractDAO_FinderParams',
            ],
            'CMS' => [
                'Point7_CMS_Attachment',
                'Point7_CMS_Attachment_DAO_PDOMySQL',
                'Point7_CMS_Attachment_DeleteHelper',
                'Point7_CMS_Attachment_Upload_Manager',
                'Point7_CMS_Attachment_Upload_Manager_HashFileToFolderMethod',
                'Point7_CMS_Attachment_Upload_Profile',
                'Point7_CMS_Attachment_Upload_Exception',
                'Point7_CMS_Attachment_Exception',
            ],
        ];

        $files = $map[$component] ?? [];
        foreach ($files as $class) {
            $file = self::$baseDir . '/' . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }
}
