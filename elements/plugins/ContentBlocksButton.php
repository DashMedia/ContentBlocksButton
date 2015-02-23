<?php
/**
 * @name ContentBlocksButton
 * @description This is an example plugin.  List the events it attaches to in the PluginEvents.
 * @PluginEvents ContentBlocks_RegisterInputs
 * @var modX $modx
 * @var ContentBlocks $contentBlocks
 * @var array $scriptProperties
 */

// Your core_path will change depending on whether your code is running on your development environment
// or on a production environment (deployed via a Transport Package).  Make sure you follow the pattern
// outlined here. See https://github.com/craftsmancoding/repoman/wiki/Conventions for more info
$core_path = $modx->getOption('contentblocksbutton.core_path', null, MODX_CORE_PATH.'components/contentblocksbutton/');
include_once $core_path .'vendor/autoload.php';

if ($modx->event->name == 'ContentBlocks_RegisterInputs') {
    // Load your own class. No need to require cbBaseInput, that's already loaded.
    $path = $modx->getOption('contentblocksbutton.core_path', null, MODX_CORE_PATH . 'components/contentblocksbutton/lib/inputs/');
    require_once($path . 'ContentBlocksButton.class.php');
    
    // Create an instance of your input type, passing the $contentBlocks var
    $instance = new ContentBlocksButton($contentBlocks);
    
    // Pass back your input reference as key, and the instance as value
    $modx->event->output(array(
        'ContentBlocksButton' => $instance
    ));
}