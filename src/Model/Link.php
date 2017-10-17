<?php

namespace SilverStripe\ElementalBlocks\Model;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ElementalBlocks\Block\BannerBlock;
use SilverStripe\ORM\DataObject;

/**
 * A Link object is used to represent the data required for a link to a page in a SilverStripe
 * site. For example, it can be used for "call to action" or "image links" on a
 * {@link BannerBlock} block.
 */
class Link extends DataObject
{
    private static $db = [
        'Text' => 'Varchar(255)',
        'Description' => 'Varchar(255)',
        'NewWindow' => 'Boolean',
    ];

    private static $has_one = [
        'Target' => SiteTree::class,
    ];
}
