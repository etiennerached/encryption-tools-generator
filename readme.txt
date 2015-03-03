=== Encryption Tools Generator ===
Contributors: etiennerached
Tags: wordpress, security, encryption, tools, online generator, htpasswd, http authentication, md5, sha1, htaccess
Requires at least: 3.3.1
Tested up to: 4.1.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Convert your wordpress page or post to a security or encryption online tool generator.

== Description ==

This plugin Provides shortcodes to automatically generate a security and encryption tools on your wordpress website.

The generated encryption currently supported are:
1- htpasswd generator.
2- MD5 generator.
3- SHA1 generator.

The shortcodes can be added on any page or post.

The generated forms support bootstrap 3.

More tools will be added every version.

== Installation ==

1. Upload the wordpress-encryption-tools-generator directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. In your post or page add the shortcode(s).
4. Available shortcodes are:
4.a. [encryption-tools-htpasswd] - A form that will take a username and password and generate the username and encrypted password for the .htpasswd file
4.b. [encryption-tools-md5] - A form that will convert a text to a MD5 string.
4.c. [encryption-tools-sha1] - A form that will convert a text to a SHA1 string.

== Frequently Asked Questions ==

= Will there be more shortcodes and tools available in the future? =

Yes, new shortcodes for new tools will be available frequently.

= Does the generated forms support bootstrap? =

Yes the generated forms are responsive and support bootstrap.

= I have an idea for a tool, can you please add it to the plugin? =

As long as it's feasable. Please share the idea and I'll consider adding it.

== Screenshots ==

1. This is how a generated form look like.
2. Adding a shortcode to the wordpress page.
