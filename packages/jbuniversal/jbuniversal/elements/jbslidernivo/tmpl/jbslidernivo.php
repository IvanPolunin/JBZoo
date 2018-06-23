<?php
/**
 * JBZoo Application
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Application
 * @license    GPL-2.0
 * @copyright  Copyright (C) JBZoo.com, All rights reserved.
 * @link       https://github.com/JBZoo/JBZoo
 * @author     Denis Smetannikov <denis@jbzoo.com>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$this->app->jbassets->nivoslider();

$sliderId = uniqid('nivoslider-');
if (in_array('random', $params['effects'])) {
    $params['effects'] = array('random');
}

$paramsData = $this->app->data->create($params);

?>

<div class="slider-wrapper theme-default">
    <div id="<?php echo $sliderId; ?>" class="nivoSlider ">
        <?php foreach ($thumbs as $thumb) { ?>
            <img src="<?php echo $thumb['thumb']; ?>" data-thumb="<?php echo $thumb['thumb']; ?>" alt="" title="" />
        <?php } ?>
    </div>
    <div id="<?php echo $sliderId; ?>" class="nivo-html-caption"></div>
</div>

<?php echo $this->app->jbassets->widget('#' . $sliderId, 'nivoSlider', array(
    'effect'           => implode(',', $params['effects']),
    'animSpeed'        => (int)$paramsData->get('animSpeed', 500),
    'pauseTime'        => (int)$paramsData->get('pauseTime', 3000),
    'randomStart'      => (int)$paramsData->get('randomStart', 0),
    'controlNavThumbs' => (int)$paramsData->get('controlNavThumbs', 0),
    'manualAdvance'    => (int)$paramsData->get('manualAdvance', 0),
    'prevText'         => JText::_('JBZOO_PREV'),
    'nextText'         => JText::_('JBZOO_NEXT'),
    'slices'           => 15,
    'boxCols'          => 8,
    'boxRows'          => 4,
    'startSlide'       => 0,
    'directionNav'     => true,
    'directionNavHide' => true,
    'controlNav'       => true,
    'pauseOnHover'     => true
), true); ?>
