<?php

namespace SilverStripe\ElementalBlocks\Block;

use SilverStripe\ElementalBlocks\Model\Link;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;

class BannerBlock extends FileBlock
{
    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $has_one = [
        'ImageLink' => Link::class,
        'CallToActionLink' => Link::class,
    ];

    private static $singular_name = 'banner';

    private static $plural_name = 'banners';

    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Banner');
    }

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            // Remove default scaffolded relationship fields
            $fields->removeByName('ImageLinkID');
            $fields->removeByName('CallToActionLinkID');

            // Create hidden inputs for JSON input from the "insert link" modal
            $fields->addFieldsToTab('Root.Main', [
                HiddenField::create('ImageLinkData'),
                HiddenField::create('CallToActionLinkData'),
            ]);

            // Move the file upload field to the right place in the UI
            $upload = $fields->fieldByName('Root.Main.File');
            $fields->insertBefore('Content', $upload);

            // Set the height of the content fields
            $fields->fieldByName('Root.Main.Content')->setRows(5);
        });

        return parent::getCMSFields();
    }
}
