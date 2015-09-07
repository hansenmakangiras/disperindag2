<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/main.php'), array(
        'theme' => 'admin',
        'defaultController'=>'site',
        'components' => array(
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    //'site/login'=>'/',
                    'admin' => 'admin/site/index',
                    'admin/user' => 'admin/user/index',
                    //'admin/berita/index' => 'admin/berita',

                    'admin/<_c>' => '<_c>',
                    'admin/<_c>/<_a>' => '<_c>/<_a>',
                ),
            ),
        )
    )
);
?>
