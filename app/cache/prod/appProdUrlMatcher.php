<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/panel')) {
            // backend_admin_homepage
            if (rtrim($pathinfo, '/') === '/panel') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'backend_admin_homepage');
                }

                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'backend_admin_homepage',);
            }

            // blank
            if ($pathinfo === '/panel/blank') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::blankAction',  '_route' => 'blank',);
            }

            if (0 === strpos($pathinfo, '/panel/zona')) {
                // zona_new
                if ($pathinfo === '/panel/zona/new') {
                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::newAction',  '_route' => 'zona_new',);
                }

                // zona_exportar
                if ($pathinfo === '/panel/zona/exportar') {
                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::exportarAction',  '_route' => 'zona_exportar',);
                }

                // zona_create
                if ($pathinfo === '/panel/zona/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_zona_create;
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::createAction',  '_route' => 'zona_create',);
                }
                not_zona_create:

                // zona_edit
                if (preg_match('#^/panel/zona/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_edit')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::editAction',));
                }

                // zona_update
                if (preg_match('#^/panel/zona/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_zona_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_update')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::updateAction',));
                }
                not_zona_update:

                // zona_delete
                if (preg_match('#^/panel/zona/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_zona_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona_delete')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::deleteAction',));
                }
                not_zona_delete:

                // zona_all
                if ($pathinfo === '/panel/zona/all') {
                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::getZonasAction',  '_route' => 'zona_all',);
                }

                // zona
                if (preg_match('#^/panel/zona(?:/(?P<search>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'zona')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\ZonaController::indexAction',  'search' => '',));
                }

            }

            if (0 === strpos($pathinfo, '/panel/barrio')) {
                // barrio_new
                if ($pathinfo === '/panel/barrio/new') {
                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::newAction',  '_route' => 'barrio_new',);
                }

                // barrio_exportar
                if ($pathinfo === '/panel/barrio/exportar') {
                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::exportarAction',  '_route' => 'barrio_exportar',);
                }

                // barrio_create
                if ($pathinfo === '/panel/barrio/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_barrio_create;
                    }

                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::createAction',  '_route' => 'barrio_create',);
                }
                not_barrio_create:

                // barrio_edit
                if (preg_match('#^/panel/barrio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'barrio_edit')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::editAction',));
                }

                // barrio_update
                if (preg_match('#^/panel/barrio/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_barrio_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'barrio_update')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::updateAction',));
                }
                not_barrio_update:

                // barrio_delete
                if (preg_match('#^/panel/barrio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_barrio_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'barrio_delete')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::deleteAction',));
                }
                not_barrio_delete:

                // barrio_zona
                if ($pathinfo === '/panel/barrio/getbarrio') {
                    return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::getBarrioByZonaAction',  '_route' => 'barrio_zona',);
                }

                // barrio
                if (preg_match('#^/panel/barrio(?:/(?P<search>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'barrio')), array (  '_controller' => 'Backend\\AdminBundle\\Controller\\BarrioController::indexAction',  'search' => '',));
                }

            }

            if (0 === strpos($pathinfo, '/panel/user')) {
                // user_show
                if (preg_match('#^/panel/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::showAction',));
                }

                // user_new
                if ($pathinfo === '/panel/user/new_user') {
                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
                }

                // user_create
                if ($pathinfo === '/panel/user/create_user') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_user_create;
                    }

                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
                }
                not_user_create:

                // user_edit
                if (preg_match('#^/panel/user/(?P<id>[^/]++)/edit_user$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::editAction',));
                }

                // user_update
                if (preg_match('#^/panel/user/(?P<id>[^/]++)/update_user$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_user_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::updateAction',));
                }
                not_user_update:

                // user_delete
                if (preg_match('#^/panel/user/(?P<id>[^/]++)/delete_user$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'DELETE', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'DELETE', 'HEAD'));
                        goto not_user_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::deleteAction',));
                }
                not_user_delete:

                // profile
                if ($pathinfo === '/panel/user/profile') {
                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::profileAction',  '_route' => 'profile',);
                }

                // user
                if (preg_match('#^/panel/user(?:/(?P<search>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::indexAction',  'search' => '',));
                }

            }

            if (0 === strpos($pathinfo, '/panel/group')) {
                // group
                if (rtrim($pathinfo, '/') === '/panel/group') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'group');
                    }

                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::indexAction',  '_route' => 'group',);
                }

                // group_show
                if (preg_match('#^/panel/group/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'group_show')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::showAction',));
                }

                // group_new
                if ($pathinfo === '/panel/group/new') {
                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'group_new',);
                }

                // group_create
                if ($pathinfo === '/panel/group/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_group_create;
                    }

                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::createAction',  '_route' => 'group_create',);
                }
                not_group_create:

                // group_edit
                if (preg_match('#^/panel/group/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'group_edit')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::editAction',));
                }

                // group_update
                if (preg_match('#^/panel/group/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_group_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'group_update')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::updateAction',));
                }
                not_group_update:

                // group_delete
                if (preg_match('#^/panel/group/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_group_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'group_delete')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\GroupController::deleteAction',));
                }
                not_group_delete:

            }

            if (0 === strpos($pathinfo, '/panel/seteo')) {
                // seteo
                if (rtrim($pathinfo, '/') === '/panel/seteo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'seteo');
                    }

                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::indexAction',  '_route' => 'seteo',);
                }

                // seteo_show
                if (preg_match('#^/panel/seteo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seteo_show')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::showAction',));
                }

                // seteo_new
                if ($pathinfo === '/panel/seteo/new') {
                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::newAction',  '_route' => 'seteo_new',);
                }

                // seteo_create
                if ($pathinfo === '/panel/seteo/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_seteo_create;
                    }

                    return array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::createAction',  '_route' => 'seteo_create',);
                }
                not_seteo_create:

                // seteo_edit
                if (preg_match('#^/panel/seteo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seteo_edit')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::editAction',));
                }

                // seteo_update
                if (preg_match('#^/panel/seteo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_seteo_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seteo_update')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::updateAction',));
                }
                not_seteo_update:

                // seteo_delete
                if (preg_match('#^/panel/seteo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_seteo_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'seteo_delete')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\SeteoController::deleteAction',));
                }
                not_seteo_delete:

            }

            if (0 === strpos($pathinfo, '/panel/log')) {
                if (0 === strpos($pathinfo, '/panel/login')) {
                    // login
                    if ($pathinfo === '/panel/login') {
                        return array (  '_controller' => 'Backend\\UserBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login',);
                    }

                    // login_check
                    if ($pathinfo === '/panel/login_check') {
                        return array('_route' => 'login_check');
                    }

                }

                // logout
                if ($pathinfo === '/panel/logout') {
                    return array('_route' => 'logout');
                }

            }

        }

        // register_user
        if ($pathinfo === '/register_user') {
            return array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::registerAction',  '_route' => 'register_user',);
        }

        // activate_account
        if (0 === strpos($pathinfo, '/activar') && preg_match('#^/activar(?:/(?P<codigo>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'activate_account')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::activateAccountAction',  'codigo' => '',));
        }

        // forgot_pass
        if ($pathinfo === '/forgot_pass') {
            return array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::forgotPasswordAction',  '_route' => 'forgot_pass',);
        }

        // change_pass
        if (0 === strpos($pathinfo, '/change_pass') && preg_match('#^/change_pass(?:/(?P<codigo>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'change_pass')), array (  '_controller' => 'Backend\\UserBundle\\Controller\\UserController::changePasswordAction',  'codigo' => '',));
        }

        if (0 === strpos($pathinfo, '/p')) {
            // access_denied
            if ($pathinfo === '/panel/acess') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::accessAction',  '_route' => 'access_denied',);
            }

            // principal
            if ($pathinfo === '/principal') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'principal',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
