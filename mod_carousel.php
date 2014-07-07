<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$list = modCarouselHelper::getList($params);


$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$background_color	= htmlspecialchars($params->get('background_color'));
$height	= htmlspecialchars($params->get('height',null));
$font_color  = htmlspecialchars($params->get('font_color'));
$font_color  = htmlspecialchars($params->get('font_color'));
$opacity = htmlspecialchars($params->get('opacity'));
$mod_title	= htmlspecialchars($params->get('title'));

require JModuleHelper::getLayoutPath('mod_carousel', $params->get('layout', 'default'));
