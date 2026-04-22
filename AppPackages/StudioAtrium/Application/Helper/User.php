<?php
namespace StudioAtrium\Application\Helper;

class User
{
    /**
     * Forum / comment author IDs treated as Studio Atrium staff.
     *
     * @return array
     */
    public static function getAdmins()
    {
        static $cache = null;
        if ($cache !== null) {
            return $cache;
        }

        $cache = array(1);

        try {
            $pdo = \Point7_WebApp::getPDO();
            $stmt = $pdo->query(
                "SELECT id FROM user WHERE type IN ('admin', 'superadmin') AND status = 'enabled'"
            );
            if ($stmt) {
                $ids = $stmt->fetchAll(\PDO::FETCH_COLUMN);
                if ($ids) {
                    $cache = array_values(array_unique(array_merge($cache, array_map('intval', $ids))));
                }
            }
        } catch (\Exception $e) {
            // keep fallback list
        }

        return $cache;
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return array(
            'user'       => 'użytkownik',
            'admin'      => 'administrator',
            'superadmin' => 'superadministrator',
            'editor'     => 'redaktor',
        );
    }

    /**
     * @return array
     */
    public static function getStatus()
    {
        return array(
            'enabled'  => 'aktywny',
            'disabled' => 'nieaktywny',
            'pending'  => 'oczekujący',
        );
    }
}
