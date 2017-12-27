<?php

/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */

namespace gplcart\modules\mobile;

use gplcart\core\Library;

/**
 * Main class for Mobile theme
 */
class Module
{

    /**
     * Library class instance
     * @var \gplcart\core\Library $library
     */
    protected $library;

    /**
     * @param Library $library
     */
    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        $routes['admin/module/settings/mobile'] = array(
            'access' => 'module_edit',
            'handlers' => array(
                'controller' => array('gplcart\\modules\\mobile\\controllers\\Settings', 'editSettings')
            )
        );
    }

    /**
     * Implements hook "template.data"
     * @param array $data
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    public function hookTemplateData(array &$data, $controller)
    {
        $this->replaceJquery($data, $controller);
    }

    /**
     * Implements hook "theme"
     * @param \gplcart\core\Controller $controller
     */
    public function hookTheme($controller)
    {
        if ($controller->isCurrentTheme('mobile') && !$controller->isInternalRoute()) {
            $this->setModuleAssets($controller);
            $this->setModuleMetaTags($controller);
        }
    }

    /**
     * Sets module specific assets
     * @param \gplcart\core\Controller $controller
     */
    protected function setModuleAssets($controller)
    {
        $controller->addAssetLibrary('jquery_mobile');
        $controller->setJs(__DIR__ . '/js/common.js');
        $controller->setCss(__DIR__ . '/css/common.css');
    }

    /**
     * Sets meta tags
     * @param \gplcart\core\Controller $controller
     */
    protected function setModuleMetaTags($controller)
    {
        $controller->setMeta(array('charset' => 'utf-8'));
        $controller->setMeta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1'));
    }

    /**
     * Downgrade jQuery
     * Jquery Mobile 1.4.5 does not work correctly with Jquery 2.2.4
     * @link https://github.com/jquery/jquery/issues/2936
     * @param array $data
     * @param \gplcart\core\controllers\frontend\Controller $controller
     * @return bool
     */
    protected function replaceJquery(array &$data, $controller)
    {
        if (!$controller->isCurrentTheme('mobile') || empty($data['_js_top']) || $controller->isInternalRoute()) {
            return false;
        }

        $jquery = $this->library->get('jquery');

        foreach ($data['_js_top'] as $key => $asset) {

            if (dirname($asset['file']) !== $jquery['basepath']) {
                continue;
            }

            $asset['file'] = __DIR__ . '/js/jquery.js';
            $asset['key'] = $asset['asset'] = gplcart_path_normalize(gplcart_path_relative($asset['file']));
            $data['_js_top'][$asset['key']] = $asset;

            unset($data['_js_top'][$key]);
            return true;
        }

        return false;
    }

}
