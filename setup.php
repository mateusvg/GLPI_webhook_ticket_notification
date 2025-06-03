<?php

function plugin_version_meuplugin() {
    return [
        'name'           => 'Meu Plugin',
        'version'        => '1.0.0',
        'author'         => 'Seu Nome',
        'license'        => 'GPLv2+',
        'homepage'       => 'https://exemplo.com',
        'minGlpiVersion' => '10.0.0',
        'csrf_compliant' => true
    ];
}

function plugin_init_meuplugin() {
    global $PLUGIN_HOOKS;
    $PLUGIN_HOOKS['csrf_compliant']['meuplugin'] = true;
    $PLUGIN_HOOKS['item_update']['meuplugin'] = ['Ticket' => 'plugin_meuplugin_item_update'];
    include_once __DIR__ . '/hook.php'; 
}

function plugin_meuplugin_install() {
    return true;
}

function plugin_meuplugin_uninstall() {
    return true;
}
