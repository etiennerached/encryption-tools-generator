<?php
/**
 * Plugin Name: Encryption Tools Generator
 * Plugin URI: http://www.tech-and-dev.com/p/wordpress-encryption-tools-generator.html
 * Description: Provides shortcodes to automatically generate a security and encryption tools on your wordpress website. The generated encryptions currently supported are htpasswd generator, MD5 generator and SHA1 generator. Can be added on any page or post. Generated forms support the bootstrap 3.
 * Version: 0.1
 * Author: Etienne Rached
 * Author URI: http://www.tech-and-dev.com
 * License: GPL2
 */
/*  Copyright 2015  Etienne Rached

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Blocking direct access to this file
defined( 'ABSPATH' ) or die( "You don't have permission to access this file.");

//Adding Shortcodes to wordpress
add_shortcode("encryption-tools-htpasswd", "encryptionToolsHtpasswdFunction");
add_shortcode("encryption-tools-md5", "encryptionToolsMd5Function");
add_shortcode("encryption-tools-sha1", "encryptionToolsSha1Function");

/**
 *
 * Generate Htpasswd String
 *
 * @return htpasswd string
 *
 */
function encryptionToolsHtpasswdFunction()
{
	$etHtpasswdUsername = "";
	$etHtpasswdPassword = "";
	$etHtpasswdOutput = "";
	$etHtpasswdForm = "";
	$etHtpasswdUri = esc_url($_SERVER['REQUEST_URI']);

	if(isset($_POST["et-htpasswd-username"]))
	{
		$etHtpasswdUsername = sanitize_text_field($_POST["et-htpasswd-username"]);
	}
	if(isset($_POST["et-htpasswd-password"]))
	{
		$etHtpasswdPassword = sanitize_text_field($_POST["et-htpasswd-password"]);
	}

	
	if(!empty($etHtpasswdUsername) && !empty($etHtpasswdPassword))
	{
        $etHtpasswdHash = crypt($etHtpasswdPassword, rand(0,9) . rand(0,9) . '');
        $etHtpasswdOutput = $etHtpasswdUsername . ':' . $etHtpasswdHash;
	}

    $etHtpasswdForm .= '<form action="' . $etHtpasswdUri . '" method="post">';
    $etHtpasswdForm .= '<div class="form-group">';
    $etHtpasswdForm .= '<label for="Username">Username (Required)</label>';
    $etHtpasswdForm .= '<input type="text" name="et-htpasswd-username" value="' . esc_attr($etHtpasswdUsername) . '" class="form-control" required />';
    $etHtpasswdForm .= '</div>';
    $etHtpasswdForm .= '<div class="form-group">';
    $etHtpasswdForm .= '<label for="Password">Password (Required)</label>';
    $etHtpasswdForm .= '<input type="text" name="et-htpasswd-password" value="' . esc_attr($etHtpasswdPassword) . '" class="form-control" required />';
    $etHtpasswdForm .= '</div>';
	if(!empty($etHtpasswdUsername) && !empty($etHtpasswdPassword))
	{
		$etHtpasswdForm .= '<div class="form-group">';
		$etHtpasswdForm .= '<label for="htpasswd">htpasswd (Copy/Paste into your htpasswd file)</label>';
		$etHtpasswdForm .= '<input type="text" name="et-htpasswd-output" value="' . esc_attr($etHtpasswdOutput) . '" class="form-control" />';
		$etHtpasswdForm .= '</div>';
	}
    $etHtpasswdForm .= '<button type="submit" name="et-htpasswd-generate" class="btn btn-default">Generate</button>';
    $etHtpasswdForm .= '</form>';

	return $etHtpasswdForm;
}

/**
 *
 * Generate MD5 from a String
 *
 * @return MD5 string
 *
 */
function encryptionToolsMd5Function()
{
	$etMd5Text = "";
	$etMd5Output = "";
	$etMd5Form = "";
	$etMd5Uri = esc_url($_SERVER['REQUEST_URI']);

	if(isset($_POST["et-md5-text"]))
	{
		$etMd5Text = sanitize_text_field($_POST["et-md5-text"]);
	}
	
	if(!empty($etMd5Text))
	{
        $etMd5Output = md5($etMd5Text);
	}

    $etMd5Form .= '<form action="' . $etMd5Uri . '" method="post">';
    $etMd5Form .= '<div class="form-group">';
    $etMd5Form .= '<label for="Text">Text (Required)</label>';
    $etMd5Form .= '<input type="text" name="et-md5-text" value="' . esc_attr($etMd5Text) . '" class="form-control" required />';
    $etMd5Form .= '</div>';
	if(!empty($etMd5Text))
	{
		$etMd5Form .= '<div class="form-group">';
		$etMd5Form .= '<label for="MD5">MD5 Output</label>';
		$etMd5Form .= '<input type="text" name="et-md5-output" value="' . esc_attr($etMd5Output) . '" class="form-control" />';
		$etMd5Form .= '</div>';
	}
    $etMd5Form .= '<button type="submit" name="et-md5-generate" class="btn btn-default">Generate MD5</button>';
    $etMd5Form .= '</form>';

	return $etMd5Form;
}

/**
 *
 * Generate SHA1 from a String
 *
 * @return SHA1 string
 *
 */
function encryptionToolsSha1Function()
{
	$etSha1Text = "";
	$etSha1Output = "";
	$etSha1Form = "";
	$etSha1Uri = esc_url($_SERVER['REQUEST_URI']);

	if(isset($_POST["et-sha1-text"]))
	{
		$etSha1Text = sanitize_text_field($_POST["et-sha1-text"]);
	}
	
	if(!empty($etSha1Text))
	{
        $etSha1Output = sha1($etSha1Text);
	}

    $etSha1Form .= '<form action="' . $etSha1Uri . '" method="post">';
    $etSha1Form .= '<div class="form-group">';
    $etSha1Form .= '<label for="Text">Text (Required)</label>';
    $etSha1Form .= '<input type="text" name="et-sha1-text" value="' . esc_attr($etSha1Text) . '" class="form-control" required />';
    $etSha1Form .= '</div>';
	if(!empty($etSha1Text))
	{
		$etSha1Form .= '<div class="form-group">';
		$etSha1Form .= '<label for="sha1">SHA1 Output</label>';
		$etSha1Form .= '<input type="text" name="et-sha1-output" value="' . esc_attr($etSha1Output) . '" class="form-control" />';
		$etSha1Form .= '</div>';
	}
    $etSha1Form .= '<button type="submit" name="et-sha1-generate" class="btn btn-default">Generate SHA1</button>';
    $etSha1Form .= '</form>';

	return $etSha1Form;
}

?>