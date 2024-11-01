=== WP CSS Version History ===
Contributors: briankeith68
Donate link: https://www.briscoweb.com/wp-css-version-history
Tags: css versioning, css history, css user lock, css collaboration, css verion control, css restore, css team, css team editor, css verion history, codemirror
Requires at least: 4.9
Tested up to: 4.9.6
Stable tag: 1.0.8
Requires PHP: 5.4
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A Custom CSS file editor using CSS versioning and CSS post lock for team collaboration

== Description ==

WP CSS Version History is a custom css file editor using Wordpress versioning and post lock functionality.
Now your team can quickly make theme style changes without the worry of overwriting someone else's work.
WP CSS Version History stores all the revisions for easy restoration. See changes immediately without clearing cache.
Codemirror* editor features like auto completion, code folding, bracket and tag matching.

== Installation ==

1. Upload the entire `wp-css-version-history` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

You will find 'WP CSS Version History' menu item in the 'Appearance' WordPress admin panel. Select 'WP-CSS-Version-History' to edit

For basic usage, you can also have a look at the [plugin web site](https://www.briscoweb.com/wp-css-version-history).

== Frequently asked questions ==

= Does this edit my current theme or child theme CSS? =

No. A custom css file is loaded at end of all other CSS files. 

= What is the custom file name? =

{blogurl}/wp-content/plugins/wp-css-version-history/public/css/wp-css-version-history-public.css?ver={1524397551}.

= Will I need to clear cache before seeing the changes? =

No. After every CSS change there is a new version url variable appended to the file. See previous FAQ

== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png

== Changelog ==

= 1.0 =
* Initial release
= 1.0.1 =
Hide Visual Composer and other controls not needed
= 1.0.8 =
Auto height editor
Menu link sent directly to editor

== Upgrade Notice ==

= 1.0 =
* Initial release
= 1.0.1 =
* Hide Visual Composer and other controls not needed
= 1.0.8 =
* Auto height editor
* Menu link sent directly to editor
= 1.0.9 =
* Fixed object detect error
