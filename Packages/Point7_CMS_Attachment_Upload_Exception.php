<?php
class Point7_CMS_Attachment_Upload_Exception extends RuntimeException
{
    const ERR_WRONG_FILE_EXTENSION = 1;
    const ERR_FILE_TOO_LARGE       = 2;
    const ERR_UPLOAD_FAILED        = 3;
    const ERR_STORAGE_FAILED       = 4;
}
