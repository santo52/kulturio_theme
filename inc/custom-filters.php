<?php

function kulturai_the_logo( $type ) {
 
    if($type !== 'desktop' && $type !== 'mobile') return;

    $baseURL = get_template_directory_uri();
    $logo = get_theme_mod("logo_{$type}");

    if($logo) {
        $logoImage = wp_get_attachment_image($logo, 'full');
    } else {
        $logoImage = "<img src='{$baseURL}/assets/images/logo-{$type}.svg' alt='default logo {$type}' />";
    }

    echo "<a href='/'>{$logoImage}</a>";
}

add_filter( 'the_logo', 'kulturai_the_logo' );


function kulturai_the_thumbnail( $type ) {
 
    if ( has_post_thumbnail() ) {
        $url = get_the_post_thumbnail_url( null, 'full' );
        // echo "<div class='post-thumbnail' style='background-image: url({$url})'></div>";
        echo "<div class='post-thumbnail'><img src='{$url}' /></div>";
    }

    
}

add_filter( 'the_thumbnail', 'kulturai_the_thumbnail' );




function kulturai_the_author_name() {

    $firstName = get_the_author_meta('user_firstname');
    $lastName = get_the_author_meta('user_lastname');
    
    if($firstName) echo $firstName;

    if($firstName && $lastName) echo " ";

    if($lastName) echo $lastName;
}

add_filter( 'the_author_name', 'kulturai_the_author_name' );
?>