<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined ( '_JEXEC' ) or die ();
$document = JFactory::getDocument();
$modulePath = JURI::base() . 'modules/mod_phz_articles_carousel/';


$scripts = array_keys($document->_scripts);
$scriptFound = false;

foreach($scripts as $script) {
    if(strpos($script,'jquery') !== false) {
        $scriptFound = true;
        break;
    }
}

if(!$scriptFound) {
     $document->addScript("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js");
}

$document->addScript($modulePath.'tmpl/js/scripts.js');
$document->addScript($modulePath.'tmpl/js/jquery.tinycarousel.min.js');
$document->addStyleSheet($modulePath.'tmpl/css/stylesheet.css');

?>
<div class="carousel df" style="
		<?php if(isset($height) && $height != ''){?>
					height: <?php echo $height; ?>px;
		<?php }?>
	">
	<?php if(isset($opacity) && $opacity != 0){?>
		<div class="silhoutte" style="
		 	-khtml-opacity: .<?php echo $opacity; ?>;
	        -moz-opacity: .<?php echo $opacity; ?>;
			-ms-filter: 'alpha(opacity=<?php echo $opacity; ?>)';
			filter: alpha(opacity=<?php echo $opacity; ?>);
			filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.<?php echo $opacity; ?>;);
			opacity: .<?php echo $opacity; ?>;;
		"></div>
	<?php }?>
	<a class="buttons prev" href="#">&#60;</a>
    <div class="viewport" style="
		<?php if(isset($height) && $height != ''){?>
					height: <?php echo $height; ?>px;
		<?php }?>
	">
	   <ul class="overview">
	   <?php
	   foreach($list as $item ){
        ?>
            <li style="
		          <?php if(isset($height) && $height != ''){?>
					height: <?php echo $height; ?>px;
		          <?php }?>
	       ">
                <div class="carousel-item"
                	style="
                		<?php
                        if(isset($item->image) && $item->image != '' && (strpos($item->image, "http") === FALSE && strpos($item->image, "www") === FALSE)) {
                            $item->image = JURI::base() . $item->image;
                        }
                         if(isset($item->image) && $item->image != ''){?>
                				background-image:url( <?php echo $item->image; ?>);
                		<?php }?>
                		<?php if(isset($background_color) && $background_color != ''){?>
					       		background-color: <?php echo $background_color; ?>;
		                 <?php }?>
                		<?php if(isset($height) && $height != ''){?>
					       		height: <?php echo $height; ?>px;
		                 <?php }?>
                	"
                >
                    <div class="texts">
                        <a class="title"
                            href="<?php echo $item->link; ?>"
                            style="
                                <?php if(isset($font_color) && $font_color != ''){?>
                                    color: <?php echo $font_color; ?>
                                <?php }?>
                        ">
                				<?php echo $item->title; ?>
                		</a>

                		<a class="link"
                            style="
                                <?php if(isset($font_color) && $font_color != ''){?>
                                    color: <?php echo $font_color; ?>;
                                    border-color: <?php echo $font_color; ?>;
                                <?php }?>
                            "
                        href="<?php echo $item->link; ?>">
                			<?php echo $item->category_alias; ?> <strong>&#8594;</strong>
                		</a>
                	</div>
                </div>
            </li>
        <?php }?>
		</ul>
	</div>
	<a class="buttons next" href="#">&#62;</a>
</div>
