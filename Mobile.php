<?php

/**
 * @package Mobile
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2015, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl.html GNU/GPLv3
 */

namespace gplcart\modules\mobile;

use gplcart\core\Module;

/**
 * Main class for Mobile theme
 */
class Mobile extends Module
{

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
     * Implements hook "theme"
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    public function hookTheme($controller)
    {
        if ($controller->isCurrentTheme('mobile')) {

            $controller->addAssetLibrary('jquery_mobile');
            $controller->setJs($this->getAsset('mobile', 'common.js'));
            $controller->setCss($this->getAsset('mobile', 'common.css'));

            $controller->setMeta(array('charset' => 'utf-8'));
            $controller->setMeta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1'));
        }
    }

    /**
     * Implements hook "template.data"
     * @param array $data
     * @param \gplcart\core\controllers\frontend\Controller $controller
     */
    public function hookTemplateData(array &$data, $controller)
    {
        // Jquery Mobile 1.4.5 does not work correctly with Jquery 2.2.4
        // See https://github.com/jquery/jquery/issues/2936
        // Here we're going to downgrade to version 2.1.4 which is provided by this module
        if ($controller->isCurrentTheme('mobile') && !empty($data['_js_top'])) {
            $this->replaceJquery($data);
        }
    }

    /**
     * Replace the system Jquery file
     * @param array $data
     */
    protected function replaceJquery(array &$data)
    {
        $jquery = $this->getLibrary()->get('jquery');

        foreach ($data['_js_top'] as $key => $asset) {

            if (dirname($asset['file']) !== $jquery['basepath']) {
                continue;
            }

            $asset['file'] = $this->getAsset('mobile', 'jquery.js');
            $asset['key'] = $asset['asset'] = str_replace('\\', '/', gplcart_relative_path($asset['file']));
            $data['_js_top'][$asset['key']] = $asset;

            unset($data['_js_top'][$key]);
            break;
        }
    }

}
