<?php

/* Finding the path to the wp-admin folder */
$iswin = preg_match('/:\\\/', dirname(__file__));
$slash = ($iswin) ? "\\" : "/";

$wp_path = preg_split('/(?=((\\\|\/)wp-content)).*/', dirname(__file__));
$wp_path = (isset($wp_path[0]) && $wp_path[0] != "") ? $wp_path[0] : $_SERVER["DOCUMENT_ROOT"];

/** Load WordPress Administration Bootstrap */
require_once($wp_path . $slash . 'wp-load.php');
require_once($wp_path . $slash . 'wp-admin' . $slash . 'admin.php');

load_plugin_textdomain( 'kimili-flash-embed', FALSE, 'scribble-maps-kml-embed/langs/');

$title = "Scribble Maps Embed";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php do_action('admin_xml_ns'); ?> <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<title><?php bloginfo('name') ?> &rsaquo; <?php echo wp_specialchars( $title ); ?> &#8212; WordPress</title>
<?php

wp_admin_css( 'css/global' );
wp_admin_css();
wp_admin_css( 'css/colors' );
wp_admin_css( 'css/ie' );

$hook_suffix = '';
if ( isset($page_hook) )
	$hook_suffix = "$page_hook";
else if ( isset($plugin_page) )
	$hook_suffix = "$plugin_page";
else if ( isset($pagenow) )
	$hook_suffix = "$pagenow";

do_action("admin_print_styles-$hook_suffix");
do_action('admin_print_styles');
do_action("admin_print_scripts-$hook_suffix");
do_action('admin_print_scripts');
do_action("admin_head-$hook_suffix");
do_action('admin_head');


?>
<link rel="stylesheet" href="<?php echo plugins_url('/scribble-maps-kml-embed/css/generator.css'); ?>?ver=<?php echo $KimiliFlashEmbed->version ?>" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="<?php echo plugins_url('/scribble-maps-kml-embed/js/kfe.js'); ?>?ver=<?php echo $KimiliFlashEmbed->version ?>" type="text/javascript" charset="utf-8"></script>
<!--
	<?php echo wp_specialchars($title." Tag Generator" ); ?> is heavily based on
	SWFObject 2 HTML and JavaScript generator v1.2 <http://code.google.com/p/swfobject/>
	Copyright (c) 2007-2008 Geoff Stearns, Michael Williams, and Bobby van der Sluis
	This software is released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
-->

</head>
<body class="<?php echo apply_filters( 'admin_body_class', '' ); ?>">

	<div class="wrap" id="KFE_Generator">
	
		<h2><?php echo wp_specialchars($title." ".__("Widget Generator",'kimili-flash-embed') ); ?></h2> 

		<div class="note"><?php _e('Asterisk (<span class="req">*</span>) indicates required field','kimili-flash-embed'); ?></div> 
		<fieldset> 
			<legend><?php _e("SWF definition",'kimili-flash-embed'); ?> [ <a id="toggle2" href="#">-</a> ]</legend> 
			<div id="toggleable2">
				<div class="col1"> 
					<label title="<?php _e("Pick either Map ID or a URL to a valid KML file",'kimili-flash-embed'); ?>" class="info"><?php _e("Select One",'kimili-flash-embed'); ?>:</label> <span class="req">*</span> 
				</div> 
				<div class="col2">
					<div style="width:150px;white-space: nowrap;">
						<label for="mapID" title="<?php _e("The Map ID of your map on ScribbleMaps.com",'kimili-flash-embed'); ?>" class="info"><?php _e("Map ID",'kimili-flash-embed'); ?></label> 
						<input type="radio" group="idType" id="idType" name="idType" value="mapID" style="width:20px;" checked="checked" />
						<label style="padding-right:5px;"><i>or</i></label>
						<label for="kmlUrl" title="<?php _e("The URL to the KML to use in the map.",'kimili-flash-embed'); ?>" class="info"><?php _e("KML Url",'kimili-flash-embed'); ?></label>
						<input type="radio" group="idType" id="idType" name="idType" value="kmlUrl" style="width:20px;"  />
					</div>
				</div>
				<div class="clear">&nbsp;</div>
				<div class="col1"> 
					&nbsp;
				</div>
				<div class="col2"> 
					<input type="text" id="idOrKml" name="idOrKml" value="" size="10" /> 
				</div>
				<div class="clear">&nbsp;</div> 
				<div class="col1"> 
					<label title="<?php _e("Width &times; height (unit)",'kimili-flash-embed'); ?>" class="info"><?php _e("Dimensions",'kimili-flash-embed'); ?>:</label> <span class="req">*</span> 
				</div> 
				<div class="col2"> 
					<input type="text" id="width" name="width" value="<?php echo get_option('kml_flashembed_width'); ?>" size="5" maxlength="5" /> 
					&times;
					<input type="text" id="height" name="height" value="<?php echo get_option('kml_flashembed_height'); ?>" size="5" maxlength="5" /> 
					<select id="unit" name="unit"> 
						<option <?php if (get_option('kml_flashembed_dimensions_unit') == "pixels") echo "selected=\"selected\""; ?>  value="pixels"><?php _e("pixels",'kimili-flash-embed'); ?></option> 
						<option <?php if (get_option('kml_flashembed_dimensions_unit') == "percentage") echo "selected=\"selected\""; ?>  value="percentage"><?php _e("percentage",'kimili-flash-embed'); ?></option> 
					</select> 
				</div>
				<div class="clear">&nbsp;</div>
				<div class="col1"> 
					<label class="info" title="<?php _e("HTML object element nested param elements",'kimili-flash-embed'); ?>"><?php _e("Parameters",'kimili-flash-embed'); ?>:</label> 
				</div> 
				<div class="col3"> 
					<label for="align" class="info" title="<?php _e("HTML alignment of the object element. If this attribute is omitted, it by default centers the movie and crops edges if the browser window is smaller than the movie. NOTE: Using this attribute is not valid in XHTML 1.0 Strict.",'kimili-flash-embed'); ?>">Align</label> 
				</div> 
				<div class="col4"> 
					<select id="align" name="align"> 
						<option value=""><?php _e("Choose",'kimili-flash-embed'); ?>...</option>
						<option <?php if (get_option('kml_flashembed_align') == "left") echo "selected=\"selected\""; ?> value="left">left</option> 
						<option <?php if (get_option('kml_flashembed_align') == "right") echo "selected=\"selected\""; ?> value="right">right</option>
						<option <?php if (get_option('kml_flashembed_align') == "center") echo "selected=\"selected\""; ?> value="center">center</option> 
						<option <?php if (get_option('kml_flashembed_align') == "top") echo "selected=\"selected\""; ?> value="top">top</option> 
						<option <?php if (get_option('kml_flashembed_align') == "bottom") echo "selected=\"selected\""; ?> value="bottom">bottom</option> 
					</select> 
				</div> 
				<div class="clear">&nbsp;</div> 
				<div class="col1">&nbsp;</div> 
				<div class="col3"> 
					<label for="drag" class="info" title="<?php _e("Whether or not the map can be dragged to change what is visible.",'kimili-flash-embed'); ?>">Enable Drag</label> 
				</div> 
				<div class="col4"> 
					<select id="drag" name="drag"> 
						<option value=""><?php _e("Choose",'kimili-flash-embed'); ?>...</option> 
						<option <?php if (get_option('kml_flashembed_drag') == "true") echo "selected=\"selected\""; ?> value="true">true</option> 
						<option <?php if (get_option('kml_flashembed_drag') == "false") echo "selected=\"selected\""; ?> value="false">false</option> 
					</select> 
				</div>
				<div class="clear">&nbsp;</div>
				<div class="col1">&nbsp;</div>
				<div class="col3"> 
					<label for="position" class="info" title="<?php _e("Specifies whether the position controls are shown.",'kimili-flash-embed'); ?>.">Position Control</label> 
				</div> 
				<div class="col4"> 
					<select id="position" name="position"> 
						<option value=""><?php _e("Choose",'kimili-flash-embed'); ?>...</option> 
						<option <?php if (get_option('kml_flashembed_position') == "true") echo "selected=\"selected\""; ?> value="true">true</option> 
						<option <?php if (get_option('kml_flashembed_position') == "false") echo "selected=\"selected\""; ?> value="false">false</option> 
					</select> 
				</div> 
				<div class="clear">&nbsp;</div> 
				<div class="col1">&nbsp;</div> 
				<div class="col3"> 
					<label for="mapType" class="info" title="<?php _e("Show the controls which allow the user to switch the map type (Map, Satellite, Hybrid)",'kimili-flash-embed'); ?>">Map Type Control</label> 
				</div> 
				<div class="col4"> 
					<select id="mapType" name="mapType"> 
						<option value=""><?php _e("Choose",'kimili-flash-embed'); ?>...</option> 
						<option <?php if (get_option('kml_flashembed_mapType') == "true") echo "selected=\"selected\""; ?> value="true">true</option> 
						<option <?php if (get_option('kml_flashembed_mapType') == "false") echo "selected=\"selected\""; ?> value="false">false</option> 
					</select> 
				</div>
				<div class="clear">&nbsp;</div> 
				<div class="col1">&nbsp;</div> 
				<div class="col3"> 
					<label for="zoom" class="info" title="<?php _e("Show the controls which allow the user to switch the map type (Map, Satellite, Hybrid)",'kimili-flash-embed'); ?>">Zoom Control</label> 
				</div> 
				<div class="col4"> 
					<select id="zoom" name="zoom"> 
						<option value=""><?php _e("Choose",'kimili-flash-embed'); ?>...</option> 
						<option <?php if (get_option('kml_flashembed_zoom') == "true") echo "selected=\"selected\""; ?> value="true">true</option> 
						<option <?php if (get_option('kml_flashembed_zoom') == "false") echo "selected=\"selected\""; ?> value="false">false</option> 
					</select> 
				</div>
				<div class="clear">&nbsp;</div> 
				<div class="col1">&nbsp;</div> 
				<div class="col3"> 
					<label for="zoom" class="info" title="<?php _e("Show the legend in the map (if applicable).",'kimili-flash-embed'); ?>">Show Legend</label> 
				</div> 
				<div class="col4"> 
					<select id="legend" name="legend"> 
						<option value=""><?php _e("Choose",'kimili-flash-embed'); ?>...</option> 
						<option <?php if (get_option('kml_flashembed_legend') == "true") echo "selected=\"selected\""; ?> value="true">true</option> 
						<option <?php if (get_option('kml_flashembed_legend') == "false") echo "selected=\"selected\""; ?> value="false">false</option> 
					</select> 
				</div> 
			</div> 
		</fieldset> 
		<div class="col1"> 
			<input type="button" class="button" id="generate" name="generate" value="<?php _e("Generate",'kimili-flash-embed'); ?>" />
		</div>
		<div class="clear">&nbsp;</div>
		<div style="padding-top:20px;">
			<div style="width:480px;margin:auto;">
				<object width="480" height="385" style="margin:auto;">
					<param name="movie" value="http://www.youtube.com/v/ekW93IFh9ew?fs=1&amp;hl=en_US"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="allowscriptaccess" value="always"></param>
					<embed src="http://www.youtube.com/v/ekW93IFh9ew?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed>
				</object>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" charset="utf-8">
		// <![CDATA[
		jQuery(document).ready(function(){
			try {
				Kimili.Flash.Generator.initialize();
				Kimili.Flash.Generator.i18n = {
					more : "<?php _e("more",'kimili-flash-embed'); ?>",
					less : "<?php _e("less",'kimili-flash-embed'); ?>"
				};
			} catch (e) {
				throw "<?php _e("Kimili is not defined. This generator isn't going to put a KFE tag in your code.",'kimili-flash-embed'); ?>";
			}
		});
		// ]]>
	</script>

</body>
</html>