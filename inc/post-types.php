<?php
// custom post types 

//Thermostat CPT
function register_cpt_thermostats() {
	$labels = array(
		'name' 				=> ( 'Thermostats' ),
		'singular_name' 	=> ( 'Thermostats' ),
		'add_new' 			=> ( 'Add New Thermostat' ),
		'add_new_item' 		=> ( 'Add New Thermostat' ),
		'edit_item' 		=> ( 'Edit Thermostat' ),
		'new_item' 			=> ( 'New Thermostat' ),
		'view_item' 		=> ( 'View Thermostat' ),
		'search_items' 		=> ( 'Search Thermostats' ),
		'not_found' 		=> ( 'No Thermostats found' ),
		'not_found_in_trash'=> ( 'No Thermostats found in Trash' ),
		'parent_item_colon' => ( 'Parent Thermostats:' ),
		'menu_name' 		=> ( 'Thermostats' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My Thermostats',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' 		=> array( 'thermostat-type' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'thermostats', $args );	
}
add_action( 'init', 'register_cpt_thermostats' );

add_action('init', 'create_thermostat_type');

function create_thermostat_type(){
	register_taxonomy(
		'thermostat-type',
		'thermostats',
		array(
			'label' => __( 'Thermostat Categories' ),
			'rewrite' => array( 'slug' => 'thermostat-type' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}


//Motor CPT
function register_cpt_motors() {
	$labels = array(
		'name' 				=> ( 'Motors' ),
		'singular_name' 	=> ( 'Motors' ),
		'add_new' 			=> ( 'Add New Motor' ),
		'add_new_item' 		=> ( 'Add New Motor' ),
		'edit_item' 		=> ( 'Edit Motor' ),
		'new_item' 			=> ( 'New Motor' ),
		'view_item' 		=> ( 'View Motors' ),
		'search_items' 		=> ( 'Search Motors' ),
		'not_found' 		=> ( 'No Motors found' ),
		'not_found_in_trash'=> ( 'No Motors found in Trash' ),
		'parent_item_colon' => ( 'Parent Motors:' ),
		'menu_name' 		=> ( 'Motors' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My Motors',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' 		=> array( 'motor-type' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'motors', $args );	
}
add_action( 'init', 'register_cpt_motors' );

add_action('init', 'create_motor_type');

function create_motor_type(){
	register_taxonomy(
		'motor-type',
		'motors',
		array(
			'label' => __( 'Motor Categories' ),
			'rewrite' => array( 'slug' => 'motor-type' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}

//TechPure Flex CPT
function register_cpt_techpure_flex() {
	$labels = array(
		'name' 				=> ( 'TechPure Flex' ),
		'singular_name' 	=> ( 'TechPure Flex' ),
		'add_new' 			=> ( 'Add New TechPure Flex' ),
		'add_new_item' 		=> ( 'Add New TechPure Flex' ),
		'edit_item' 		=> ( 'Edit TechPure Flex' ),
		'new_item' 			=> ( 'New TechPure Flex' ),
		'view_item' 		=> ( 'View TechPure Flex' ),
		'search_items' 		=> ( 'Search TechPure Flex' ),
		'not_found' 		=> ( 'No TechPure Flex found' ),
		'not_found_in_trash'=> ( 'No TechPure Flex found in Trash' ),
		'parent_item_colon' => ( 'Parent TechPure Flex:' ),
		'menu_name' 		=> ( 'TechPure Flex' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My TechPure Flex',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' 		=> array( 'techpure-flex-type' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'techpure_flex', $args );	
}
add_action( 'init', 'register_cpt_techpure_flex' );

add_action('init', 'create_techpure_flex_type');

function create_techpure_flex_type(){
	register_taxonomy(
		'techpure-flex-type',
		'techpure_flex',
		array(
			'label' => __( 'TechPure Flex Categories' ),
			'rewrite' => array( 'slug' => 'techpure-flex-type' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}

//Indoor Air Quality CPT
function register_cpt_airquality() {
	$labels = array(
		'name' 				=> ( 'Indoor Air Quality' ),
		'singular_name' 	=> ( 'Indoor Air Quality' ),
		'add_new' 			=> ( 'Add New Indoor Air Quality' ),
		'add_new_item' 		=> ( 'Add New Indoor airquality' ),
		'edit_item' 		=> ( 'Edit Indoor Air Quality' ),
		'new_item' 			=> ( 'New Indoor Air Quality' ),
		'view_item' 		=> ( 'View Indoor Air Quality' ),
		'search_items' 		=> ( 'Search Indoor Air Quality' ),
		'not_found' 		=> ( 'No Indoor Air Quality found' ),
		'not_found_in_trash'=> ( 'No Indoor Air Quality found in Trash' ),
		'parent_item_colon' => ( 'Parent Indoor Air Quality:' ),
		'menu_name' 		=> ( 'Indoor Air Quality' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My Indoor Air Quality',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' 		=> array( 'air-quality-type' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'airquality', $args );	
}
add_action( 'init', 'register_cpt_airquality' );

add_action('init', 'create_airquality_type');

function create_airquality_type(){
	register_taxonomy(
		'air-quality-type',
		'airquality',
		array(
			'label' => __( 'Indoor Air Quality Categories' ),
			'rewrite' => array( 'slug' => 'air-quality-type' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}

//Chemicals CPT
function register_cpt_chemicals() {
	$labels = array(
		'name' 				=> ( 'Chemicals' ),
		'singular_name' 	=> ( 'Chemicals' ),
		'add_new' 			=> ( 'Add New Chemical' ),
		'add_new_item' 		=> ( 'Add New Chemical' ),
		'edit_item' 		=> ( 'Edit Chemical' ),
		'new_item' 			=> ( 'New Chemical' ),
		'view_item' 		=> ( 'View Chemicals' ),
		'search_items' 		=> ( 'Search Chemicals' ),
		'not_found' 		=> ( 'No Chemicals found' ),
		'not_found_in_trash'=> ( 'No Chemicals found in Trash' ),
		'parent_item_colon' => ( 'Parent Chemicals:' ),
		'menu_name' 		=> ( 'Chemicals' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My Chemicals',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' 		=> array( 'chemical-type' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'chemicals', $args );	
}
add_action( 'init', 'register_cpt_chemicals' );

add_action('init', 'create_chemical_type');

function create_chemical_type(){
	register_taxonomy(
		'chemical-type',
		'chemicals',
		array(
			'label' => __( 'Chemicals Categories' ),
			'rewrite' => array( 'slug' => 'chemical-type' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}

function register_cpt_driers() {
	$labels = array(
		'name' 				=> ( 'Driers' ),
		'singular_name' 	=> ( 'Driers' ),
		'add_new' 			=> ( 'Add New Drier' ),
		'add_new_item' 		=> ( 'Add New Drier' ),
		'edit_item' 		=> ( 'Edit Drier' ),
		'new_item' 			=> ( 'New Drier' ),
		'view_item' 		=> ( 'View Driers' ),
		'search_items' 		=> ( 'Search Driers' ),
		'not_found' 		=> ( 'No Driers found' ),
		'not_found_in_trash'=> ( 'No Driers found in Trash' ),
		'parent_item_colon' => ( 'Parent Driers:' ),
		'menu_name' 		=> ( 'Driers' ),
	);
	$args = array(
		'labels' 			=> $labels,
		'hierarchical' 		=> true,
		'description' 		=> 'My Driers',
		'supports' 			=> array( 'title', 'editor', 'thumbnail' , 'excerpt', 'author', 'revisions', 'custom-fields'),
		'taxonomies' 		=> array( 'drier-type' ),
		'public' 			=> true,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'menu_position' 	=> 4,
		'hierarchical' 		=> true,
		'show_in_nav_menus' => true,
		'publicly_queryable'=> true,
		'exclude_from_search'=> false,
		'has_archive' 		=> false,
		'query_var' 		=> true,
		'can_export' 		=> true,
		'capability_type' 	=> 'post'
	);
	register_post_type( 'driers', $args );	
}
add_action( 'init', 'register_cpt_driers' );

add_action('init', 'create_drier_type');

function create_drier_type(){
	register_taxonomy(
		'drier-type',
		'driers',
		array(
			'label' => __( 'Drier Categories' ),
			'rewrite' => array( 'slug' => 'drier-type' ),
			'hierarchical' => true,
			'query_var'  => true,
		)
	);
}
?>