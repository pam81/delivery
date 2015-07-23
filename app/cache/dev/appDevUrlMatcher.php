<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/js')) {
            if (0 === strpos($pathinfo, '/js/e8b976d')) {
                // _assetic_e8b976d
                if ($pathinfo === '/js/e8b976d.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e8b976d',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_e8b976d',);
                }

                // _assetic_e8b976d_0
                if ($pathinfo === '/js/e8b976d_validate_moduser_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e8b976d',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_e8b976d_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/4b97b4d')) {
                // _assetic_4b97b4d
                if ($pathinfo === '/js/4b97b4d.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '4b97b4d',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_4b97b4d',);
                }

                // _assetic_4b97b4d_0
                if ($pathinfo === '/js/4b97b4d_forgot_pass_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '4b97b4d',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_4b97b4d_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/cc01a9f')) {
                // _assetic_cc01a9f
                if ($pathinfo === '/js/cc01a9f.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'cc01a9f',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_cc01a9f',);
                }

                // _assetic_cc01a9f_0
                if ($pathinfo === '/js/cc01a9f_validate_profile_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'cc01a9f',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_cc01a9f_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/e7062b2')) {
                // _assetic_e7062b2
                if ($pathinfo === '/js/e7062b2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e7062b2',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_e7062b2',);
                }

                // _assetic_e7062b2_0
                if ($pathinfo === '/js/e7062b2_user_index_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e7062b2',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_e7062b2_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/1db7934')) {
                // _assetic_1db7934
                if ($pathinfo === '/js/1db7934.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '1db7934',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_1db7934',);
                }

                // _assetic_1db7934_0
                if ($pathinfo === '/js/1db7934_change_pass_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '1db7934',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_1db7934_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/d5662e1')) {
                // _assetic_d5662e1
                if ($pathinfo === '/js/d5662e1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd5662e1',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_d5662e1',);
                }

                // _assetic_d5662e1_0
                if ($pathinfo === '/js/d5662e1_validate_newuser_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd5662e1',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_d5662e1_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/b1fa222')) {
                // _assetic_b1fa222
                if ($pathinfo === '/js/b1fa222.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'b1fa222',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b1fa222',);
                }

                // _assetic_b1fa222_0
                if ($pathinfo === '/js/b1fa222_register_user_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'b1fa222',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_b1fa222_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/9bc0f17')) {
            // _assetic_9bc0f17
            if ($pathinfo === '/css/9bc0f17.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '9bc0f17',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_9bc0f17',);
            }

            // _assetic_9bc0f17_0
            if ($pathinfo === '/css/9bc0f17_group_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '9bc0f17',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_9bc0f17_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js')) {
            if (0 === strpos($pathinfo, '/js/be12ebc')) {
                // _assetic_be12ebc
                if ($pathinfo === '/js/be12ebc.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'be12ebc',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_be12ebc',);
                }

                // _assetic_be12ebc_0
                if ($pathinfo === '/js/be12ebc_validate_group_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'be12ebc',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_be12ebc_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/c543be1')) {
                // _assetic_c543be1
                if ($pathinfo === '/js/c543be1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c543be1',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_c543be1',);
                }

                // _assetic_c543be1_0
                if ($pathinfo === '/js/c543be1_validate_seteo_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c543be1',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_c543be1_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/71873f3')) {
                // _assetic_71873f3
                if ($pathinfo === '/js/71873f3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '71873f3',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_71873f3',);
                }

                // _assetic_71873f3_0
                if ($pathinfo === '/js/71873f3_login_user_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '71873f3',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_71873f3_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/d7b855e')) {
                // _assetic_d7b855e
                if ($pathinfo === '/js/d7b855e.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7b855e',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_d7b855e',);
                }

                // _assetic_d7b855e_0
                if ($pathinfo === '/js/d7b855e_validate_zona_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd7b855e',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_d7b855e_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/c34c3ec')) {
                // _assetic_c34c3ec
                if ($pathinfo === '/js/c34c3ec.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c34c3ec',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_c34c3ec',);
                }

                // _assetic_c34c3ec_0
                if ($pathinfo === '/js/c34c3ec_search_index_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'c34c3ec',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_c34c3ec_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/22315e7')) {
                // _assetic_22315e7
                if ($pathinfo === '/js/22315e7.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '22315e7',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_22315e7',);
                }

                // _assetic_22315e7_0
                if ($pathinfo === '/js/22315e7_exportar_entidad_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '22315e7',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_22315e7_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/0f3543e')) {
                // _assetic_0f3543e
                if ($pathinfo === '/js/0f3543e.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0f3543e',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_0f3543e',);
                }

                // _assetic_0f3543e_0
                if ($pathinfo === '/js/0f3543e_validate_barrio_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0f3543e',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_0f3543e_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

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

        if (0 === strpos($pathinfo, '/panel')) {
            // access_denied
            if ($pathinfo === '/panel/acess') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::accessAction',  '_route' => 'access_denied',);
            }

            // principal
            if ($pathinfo === '/panel/principal') {
                return array (  '_controller' => 'Backend\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'principal',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
