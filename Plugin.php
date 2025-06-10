<?php

namespace Crydesign\Mallcraft;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'MallCraft',
            'description' => 'E-shop for October CMS',
            'author' => 'CRYDEsigN',
            'icon' => 'icon-cart'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Crydesign\Mallcraft\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'crydesign.mallcraft.some_permission' => [
                'tab' => 'mallcraft',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'mallcraft' => [
                'label' => 'MallCraft',
                'url' => Backend::url('crydesign/mallcraft/mycontroller'),
                'icon' => 'icon-leaf',
                'iconSvg' => 'plugins/crydesign/mallcraft/assets/images/logo.svg',
                'permissions' => ['crydesign.mallcraft.*'],
                'order' => 500,
                'sideMenu' => [
                    '_section_catalog' => [
                        'itemType' => 'section',
                        'icon' => 'icon-cube',
                        'label' => __('Catalog'),
                    ],
                    'categories' => [
                        'label'         => __('Categories'),
                        'icon'          => 'icon-list-alt',
                        'url'           => Backend::url('crydesign/mallcraft/categories'),
                    ],
                    'products' => [
                        'label'         => __('Products'),
                        'icon'          => 'icon-file-text-o',
                        'url'           => Backend::url('crydesign/mallcraft/products'),
                    ],
                    '_ruler_settings' => [
                        'itemType' => 'ruler',
                    ],
                    'settings' => [
                        'label'         => __('Settings'),
                        'icon'          => 'icon-settings',
                        'url'           => Backend::url('crydesign/mallcraft/settings'),
                    ],
                ]
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'Settings',
                'description' => 'Manage plugin settings.',
                'category' => 'MallCraft',
                'icon' => 'icon-settings',
                'class' => \Crydesign\Mallcraft\Models\PluginSetting::class,
                'order' => 500,
                'context' => 'mall_settings',
                'url' => 'settings/update/crydesign/mallcraft/settings'
            ],
            'currencies' => [
                'label' => 'Currency',
                'description' => 'Manage currency settings.',
                'category' => 'MallCraft',
                'icon' => 'icon-money',
                'order' => 500,
                'context' => 'mall_settings',
                'url' => Backend::url('crydesign/mallcraft/currencies')
            ],
            // 'taxes' => [
            //     'label' => 'Taxes',
            //     'description' => 'Manage taxes settings.',
            //     'category' => 'MallCraft',
            //     'icon' => 'icon-percent',
            //     'order' => 500,
            //     'context' => 'mall_settings',
            //     'url' => Backend::url('crydesign/mallcraft/currencies')
            // ]
        ];
    }
}
