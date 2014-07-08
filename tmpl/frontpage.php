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
$modulePath = JURI::base() . 'modules/mod_carousel/';


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

$document->addScript($modulePath.'tmpl/js/fp_scripts.js');
$document->addScript($modulePath.'tmpl/js/jquery.tinycarousel.min.js');
$document->addStyleSheet($modulePath.'tmpl/css/fp_stylesheet.css');

?>
<div class="carousel fp <?php if(!isset($mod_title) || $mod_title == '') {echo "notitle";} ?>" >
	<h1><?php echo $mod_title;?></h1>
    <div class="viewport" >
	   <ul class="overview">
	   <?php
	   foreach($list as $item ){
        ?>
            <li>
                <a href="<?php echo $item->link; ?>">
                    <div class="carousel-item"
                    	style="
                    		<?php if(isset($item->image) && $item->image != ''){?>
                    				background-image:url( <?php echo JURI::root() . $item->image; ?>);
                    		<?php }?>
                    		<?php if(isset($background_color) && $background_color != ''){?>
    					       		background-color: <?php echo $background_color; ?>;
    		                 <?php }?>

                    	"
                    >
                    <?php if(!isset($item->image) || $item->image == ''){?>
                    <p class="no-image"
            			style="
            				<?php if(isset($font_color) && $font_color != ''){?>
            					color: <?php echo $font_color; ?>
            				<?php }?>
            		">
            				<?php echo $item->title; ?>
            		</p>
                    <?php }?>
                    </div>
                </a>
                <div class="texts">
                		<a class="category" href="<?php echo $item->categoryLink; ?>">
                			<?php echo $item->category_alias; ?>
                		</a>
                		<a class="title"
                            href="<?php echo $item->link; ?>"
                			style="
                				<?php if(isset($font_color) && $font_color != ''){?>
                					color: <?php echo $font_color; ?>
                				<?php }?>
                		">
                				<?php echo $item->title; ?>
                		</a>
                	</div>
            </li>
        <?php }?>
		</ul>
	</div>
	<a class="buttons prev" href="#">&#60;</a>
	<a class="buttons next" href="#">&#62;</a>
</div>
