<?php
/*
    Template Name: Premium memorials
*/

// Create post object
$project = array(
    'post_type'   => 'premium_memorials',
    'post_status' => 'publish',
    'post_author' => 1,
);

// Insert the post into the database
$id = wp_insert_post( $project );
$permalink = get_permalink( $id );
wp_redirect( $permalink );