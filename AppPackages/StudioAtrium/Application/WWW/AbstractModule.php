<?php
namespace StudioAtrium\Application\WWW;

abstract class AbstractModule extends \Point7_WebApp_Module_Abstract
{
    /** @var \StudioAtrium\Application\DAORepository|null */
    protected $_daoRepository = null;

    /** Module name passed to Meta helpers (e.g. "Project", "ProjectExtend"). */
    protected $_name = '';

    public function _initAction(
        $action,
        \Point7_WebApp_Request $request,
        $appContext,
        $responseContext
    ) {
        parent::_initAction($action, $request, $appContext, $responseContext);
        if ($this->_name === '') {
            $this->_name = (new \ReflectionClass($this))->getShortName();
        }

        // Favourite projects — templates call in_array($id, $favouriteIds) site-wide.
        $this->_getFavouriteProjects($request, $appContext, $responseContext);

        // Compare cookie (optional UI)
        $compareCookie = method_exists($request, 'getCookieParam')
            ? $request->getCookieParam('saCom')
            : (isset($_COOKIE['saCom']) ? $_COOKIE['saCom'] : null);
        $compareIds = array();
        if ($compareCookie) {
            $compareIds = explode('|', $compareCookie);
        }
        $responseContext->set('compareIds', $compareIds);

        // Basket cookie
        if (!empty($_COOKIE['SA_basket'])) {
            $basket = json_decode($_COOKIE['SA_basket'], true);
            if (is_array($basket)) {
                $responseContext->set('basket', $basket);
            }
        }
    }

    /**
     * Populate favouriteIds for every page (matches production AbstractModule).
     */
    protected function _getFavouriteProjects(
        \Point7_WebApp_Request $request,
        $appContext,
        ResponseContext $responseContext
    ) {
        $favouriteIds = array();

        $user = method_exists($appContext, 'getUser') ? $appContext->getUser() : null;
        if ($user && method_exists($user, 'getProps')) {
            $props = $user->getProps(true);
            if (!is_array($props)) {
                $props = array();
            }
            $favouriteIds = isset($props['favourite']) && is_array($props['favourite'])
                ? $props['favourite']
                : array();
        } else {
            $favouriteCookie = method_exists($request, 'getCookieParam')
                ? $request->getCookieParam('saFav')
                : (isset($_COOKIE['saFav']) ? $_COOKIE['saFav'] : null);
            if ($favouriteCookie) {
                $favouriteIds = explode('|', $favouriteCookie);
            }
        }

        if (!is_array($favouriteIds)) {
            $favouriteIds = array();
        }

        $responseContext->set('favouriteIds', $favouriteIds);
    }
}
