<?php namespace Inerba\RemoteImage;

use Backend;
use System\Classes\PluginBase;
use Inerba\RemoteImage\Classes\Image;

/**
 * RemoteImage Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'RemoteImage',
            'description' => 'No description provided yet...',
            'author'      => 'Inerba',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'remote_image' => function($file_path, $width = false, $height = false, $options = []) {
                    $image = new Image($file_path);
                    return $image->resize($width, $height, $options);
                }
            ]
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Inerba\RemoteImage\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'inerba.remoteimage.some_permission' => [
                'tab' => 'RemoteImage',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'remoteimage' => [
                'label'       => 'RemoteImage',
                'url'         => Backend::url('inerba/remoteimage/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['inerba.remoteimage.*'],
                'order'       => 500,
            ],
        ];
    }
}
