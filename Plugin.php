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
            'name' => 'mallcraft',
            'description' => 'No description provided yet...',
            'author' => 'crydesign',
            'icon' => 'icon-leaf'
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
                    '_section_shop' => [
                        'itemType' => 'section',
                        'label' => 'nav.shop',
                    ],
                    'categories' => [
                        'label'         => 'nav.categories',
                        'icon'          => 'icon-file-text-o',
                        'iconSvg'       => 'plugins/crydesign/mallcraft/assets/images/categories.svg',
                        'url'           => Backend::url('crydesign/mallcraft/categories'),
                    ],
                    'products' => [
                        'label'         => 'nav.products',
                        'icon'          => 'icon-file-text-o',
                        'iconSvg'       => 'plugins/crydesign/mallcraft/assets/images/products.svg',
                        'url'           => Backend::url('crydesign/mallcraft/products'),
                    ],
                    '_ruler_settings' => [
                        'itemType' => 'ruler',
                    ],
                    '_section_settings' => [
                        'itemType' => 'section',
                        'label' => 'nav.settings',
                    ],
                    'settings' => [
                        'label'         => 'nav.shop',
                        'icon'          => 'icon-file-text-o',
                        'iconSvg'       => 'plugins/crydesign/mallcraft/assets/images/settings.svg',
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
                'icon' => 'icon-cogs',
                'iconSvg' => 'plugins/crydesign/mallcraft/assets/images/settings.svg',
                'class' => \Crydesign\Mallcraft\Models\Setting::class,
                'order' => 500,
                'context' => 'mall_settings',
                'url' => 'settings/update/crydesign/mallcraft/settings'
            ],
            'product' => [
                'label' => 'Product',
                'description' => 'Manage product settings.',
                'category' => 'MallCraft',
                'icon' => 'icon-cogs',
                'iconSvg' => 'plugins/crydesign/mallcraft/assets/images/products.svg',
                'order' => 500,
                'context' => 'mall_settings',
                'url' => Backend::url('crydesign/mallcraft/products')
            ]
        ];
    }
}
