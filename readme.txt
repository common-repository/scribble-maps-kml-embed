=== Scribble Maps ===
Contributors: scribblemaps
Tags: cloudmade, geo, google maps, kml, kmz, maps, openstreet, routes, shortcodes, widgets, scribble maps, styled maps, xls
Requires at least: 2.6
Tested up to: 3.0
Donate link: http://scribblemaps.com/
Stable tag: trunk

== Description ==

Provides a WordPress interface for embedding Scribble Maps from ScribbleMaps.com or KML from a specified url.

== Installation ==

Installing the plugin is as easy as unzipping and uploading the entire scribblemaps-embed folder into your /wp-content/plugins directory and activating the plugin. 

== Screenshots ==

The Scribble Maps Widget Embed Generator, as rendered by by Wordpress 3.0.

== Basic Usage ==

Once the plugin is installed and activated, you can add your Scribble Maps to your pages using a tag like this in your articles:

> `[ScribbleMap mapID="MyMapID" height="150" width="300" /]`

When you use the Rich Text Editor in either Visual or HTML modes, you should see a button on the right end of the upload/insert bar with the Scribble Maps logo in the visual mode or a button that reads "Scribble Maps Embed" in HTML mode. Click it, and you will be presented with the Scribble Maps Widget Embed generator which presents you with all possible embedding options. Set the options according to your needs and click the "Generate" button to drop an SM tag in your editor.

The only required attributes in an SM tag are mapID or kmlUrl, height, and width. See the the following sections all available attributes and advanced usage.

== Available Attributes ==

**mapID** (required)
The Map ID of the map you wish to embed.

OR

**kmlUrl** (required)
The url to the kml file you wish to load into the widget.

**drag**
(`true`|`false`) Enables dragging of the map around using the mouse

**position**
(`true`|`false`) Toggles visibility of the position controls which allow the user to move the map around.

**mapType**
(`true`|`false`) Toggles visibility of the map type controls which allow the user to change the type to map, satellite view, or hybrid view.

**zoom** 
(`true`|`false`) Toggles visibility of the zoom control.

**legend**
(`true`|`false`) Toggles visibility of the legend if the map has one.

== Frequently Asked Questions ==

*Coming Soon*

== Changelog ==

= 1.0.7 =
Fixed a bug where width and height were not being included.

= 1.0.6 =
Changed widget to new embed format (moved from iframe to script)

= 1.0.5 =
Changed widget to new embed format.

= 1.0.4 =
Added allowScriptAccess and allowFullscreen to the flash embed code for the widget.

= 1.0.3 =
Initial Release