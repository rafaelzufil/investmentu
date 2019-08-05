=== MaxGalleria Slick Plugin for WordPress ===
Contributors: maxfoundry, AlanP57, arcware, johnbhartley
Tags: albums, gallery, image, images, media, flash, foto, fotoalbum, photo, photos, photo albums, picture, pictures, responsive wordpress gallery, thumbmail, thumbnails, wordpress gallery, wordpress gallery plugin, responsive wordpress gallery plugins, responsive, slideshows, image slider, nivo, image slide plugin, photo slider, responsive slideshow, responsive slider plugin, slideshow plugin, wordpress picture slider, wordpress responsive slider, wordpress slider, website gallery, youtube, youtube video, youtube videos, youtube gallery, youtube video galleries, nextgen, nextgen gallery, media library, media uploader, images, image folders, responsive lightbox, swipebox, prettyphoto, fancybox, nivo lightbox, image lightbox
Requires at least: 3.9
Tested up to: 5.1
Stable tag: 1.8.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Slick Carousel for Wordpress

== Description ==

MaxGalleria Slick Plugin for WordPress
Copyright (c) 2014 Max Foundry, LLC
http://maxfoundry.com

slick.js by Ken Wheeler http://kenwheeler.github.io

= Licensing =
All files and code for this plugin are licensed with the GNU General Public License
version 2 (GPLv2), which can be found at http://www.gnu.org/licenses/gpl-2.0.html.

= Requirements =
This plugin has been tested with the self-hosted version of WordPress 3.4 and later, which
can be downloaded from http://wordpress.org. This plugin cannot be used on WordPress.com.
For more details, see http://en.support.wordpress.com/plugins/. You will need to install 
and activate the free plugin, MaxGalleria, https://wordpress.org/plugins/maxgalleria/, 
in order to use Maxgalleria Slick Carousel for WordPress.

== Installation ==
These instructions assume you already have WordPress installed or are at least familiar with
doing so. If not, see the "Installing WordPress" codex article on the official wordpress.org
site for detailed installation instructions (http://codex.wordpress.org/Installing_WordPress).

For automatic installation:

- Login to your website and go to the Plugins section of your admin panel.
- Click the Add New button.
- Under Install Plugins, click the Upload link.
- Select the plugin zip file from your computer then click the Install Now button.
- You should see a message stating that the plugin was installed successfully.
- Click the Activate Plugin link.

For manual installation:

- You should have access to the server where WordPress is installed. If you don't, see your system administrator.
- Copy the plugin zip file up to your server and unzip it somewhere on the file system.
- Copy the "maxgalleria-slick" folder into the /wp-content/plugins directory of your WordPress installation.
- Login to your website and go to the Plugins section of your admin panel.
- Look for "Maxgalleria Slick Carousel for WordPress" and click Activate.

== Support ==

Please direct all support issues and questions to http://maxgalleria.com/forums/.

Learn more about the capabilities of the Slick Slider addon on by visiting its Quick Start page at https://maxgalleria.com/documentation/maxgalleria-slick-for-wordpress/quickstart/.

== Upgrade Notice ==

For automatic upgrading:

* When new updates are available, you should see an update notice in your WordPress admin.
* Go to Dashboard > Updates to see the list of all updates available.
* Select "Maxgalleria Slick Carousel for WordPress" from the plugins list then click the "Update Plugins" button.
* After a moment, you should see a message stating that the plugin has been updated.

For manual upgrading:

* You must have access to the server where WordPress is installed, either directly or through FTP.
* It's always a good idea to backup your website files and database, so do that first.
* Login to your website and go to the Plugins section of your admin panel.
* Look for "Maxgalleria Slick Carousel for WordPress" and click Deactivate.
* Copy the plugin zip file up to your server and unzip it somewhere on the file system.
* Copy the "maxgalleria-slick" folder into the /wp-content/plugins directory of your WordPress installation. You want it to overwrite the plugin folder that is already there.
* Go back to the Plugins section of your admin panel.
* Click the Activate link for the "Maxgalleria Slick Carousel for WordPress" plugin.


== Changelog ==
= 1.8.9 =
* Added code to check license status in MaxGalleria options and settings

= 1.8.8 =
* Removed undefined constant MAXGALLERIA_MEDIA_LIBRARY_EXPIRES

= 1.8.7 =
* Fixed undefined constant MLPP_EDD_SHOP_URL

= 1.8.6 =
* Changed the default initial slide to 0

= 1.8.5 =
* Fixed issue with setting the custom image link

= 1.8.4 =
* Updated the license activation code

= 1.8.3 =
* Added the ability to open slider links in a new tab

= 1.8.2 =
* Fixed problem with utilizing lazy load progressive setting

= 1.8.1 =
* Added textarea for entering breakpoints and setting the respondsTo parameter in gallery options 
* Update the Slick library to 1.8.1 

= 1.8.0 =
* Updated Slick to version 1.8.0, and added accessibility, edgeFriction, focusOnSelect, focusOnChange, lazyLoad, pauseOnFocus, rows, slidesPerRow, swipeToSlide, touchThreshold, useTransform, waitForAnimate, zIndex options.

= 1.6.9 =
* Fixed missing padding between cloned slides

= 1.6.8 =
* Added check for custom style file before attempting to delete it

= 1.6.7 =
* Added new option UI

= 1.6.6 =
* Updated the Slick slider to 1.7.1 

= 1.6.5 =
* Added the ability to display thumbnails as dots

= 1.6.4 =
* Added hero slider mode and settings for uploading custom arrows and dots

= 1.6.3 =
* adjusted initial scroll image number

= 1.6.2 =
* Tested with Wordpress 4.7

= 1.6.1 =
* Improvements for infinite scrolling

= 1.5.10 =
* Enabled the slider arrow selection when using a skin

= 1.5.9 =
* added dependencies to the enqueuing optional custom CSS so it will be loaded last

= 1.5.8 =
* added '' as the first parameter to the maxgalleria_slick_carousel_after_slider_image hook. Image ID is now the second parameter in the filter function

= 1.5.7 =
* Updated Slick to 1.6
* removed the 'slide' option

= 1.5.6 =
* added image ID to the maxgalleria_slick_carousel_after_slider_image hook

= 1.5.5 =
* Released: May 17, 2016
* Added Easy Digital Download update and license code.

= 1.5.4 =
* Released: May 16, 2016
* Added code to override image cropping when display variable width is on

= 1.5.3 =
* Released: May 3, 2016
* Added support user define skins and new preset skins

= 1.5.2 =
* Released: February 15, 2016
* Added support for multiple image slides

=1.5.1 =
* Released: December 3, 2015
* Updated Slick to version 1.5.9

= 1.5.0 =
* Released: October 16, 2015
* Updated Slick to version 1.5.8
* added new options

= 1.0.0 =
* Released: November 8, 2014
* Initial version.
