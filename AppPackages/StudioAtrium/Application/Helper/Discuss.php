<?php
namespace StudioAtrium\Application\Helper;

class Discuss
{
    const DEFAULT_PROJECT_COMMENT_CATID = 100;

    private static $categories = array(
        100 => array(
            'title' => 'Pytania do projektu',
            'descr' => 'Fachowa pomoc naszych architektów: zmiany, doradztwo, kwestie techniczne.',
            'class' => 'fcat-ask',
            'short' => 'Pytania do projektu',
        ),
        1 => array(
            'title' => 'Budowa według projektów Studia Atrium',
            'descr' => 'Wymiana doświadczeń, koszty budowy.',
            'class' => 'fcat-sa',
            'short' => 'Budowa wg projektu',
        ),
        2 => array(
            'title' => 'Przed budową',
            'descr' => 'Wybór działki, wybór projektu, kredyty, formalności prawne.',
            'class' => 'fcat-before',
            'short' => 'Przed budową',
        ),
        3 => array(
            'title' => 'Tematy ogólnobudowlane',
            'descr' => 'Materiały i technologie, budowa i wykończenie domu, firmy budowlane.',
            'class' => 'fcat-misc',
            'short' => 'Ogólnobudowlane',
        ),
        4 => array(
            'title' => 'Urządzanie wnętrz i użytkowanie',
            'descr' => 'Porady wnętrzarskie, zagospodarowanie działki.',
            'class' => 'fcat-interior',
            'short' => 'Użytkowanie',
        ),
    );

    /**
     * @param int|null $id
     * @return array
     */
    public static function getCategories($id = null)
    {
        if ($id !== null && $id !== '') {
            $id = (int) $id;
            return isset(self::$categories[$id]) ? self::$categories[$id] : array();
        }

        return self::$categories;
    }

    /**
     * @return array IP address => reason
     */
    public static function getBlockedIp()
    {
        $list = \Point7_WebApp::getConfigParam('discuss.blocked_ip');
        return is_array($list) ? $list : array();
    }

    /**
     * @return array email => reason
     */
    public static function getBlockedEmail()
    {
        $list = \Point7_WebApp::getConfigParam('discuss.blocked_email');
        return is_array($list) ? $list : array();
    }
}
