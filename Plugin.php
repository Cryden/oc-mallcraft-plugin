<?php namespace Crydesign\Mallcraft;

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
        return []; // Remove this line to activate

        return [
            'mallcraft' => [
                'label' => 'mallcraft',
                'url' => Backend::url('crydesign/mallcraft/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['crydesign.mallcraft.*'],
                'order' => 500,
            ],
        ];
    }
}
