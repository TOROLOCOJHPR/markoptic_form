<?php
if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly
if( defined('K_ADMIN') ){
    $FUNCS->add_event_listener( 'register_admin_menuitems', 'my_register_admin_menuitems' );

    function my_register_admin_menuitems(){
        global $FUNCS;
        
        $FUNCS->register_admin_menuitem( array('name'=>'_aliados_', 'title'=>'Aliados', 'is_header'=>'1', 'weight'=>'1')  );
        
    }
}

//require_once( K_COUCH_DIR.'addons/cart/cart.php' );
//require_once( K_COUCH_DIR.'addons/inline/inline.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-folders.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-comments.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
//require_once( K_COUCH_DIR.'addons/routes/routes.php' );
//require_once( K_COUCH_DIR.'addons/jcropthumb/jcropthumb.php' );
