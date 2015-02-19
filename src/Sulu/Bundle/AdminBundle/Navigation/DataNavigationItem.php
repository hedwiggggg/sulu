<?php
/*
 * This file is part of the Sulu CMF.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sulu\Bundle\AdminBundle\Navigation;

/**
 * Represents an item in the navigation with data-navigation as "third layer".
 */
class DataNavigationItem extends NavigationItem
{
    /**
     * Url to load data from
     * @var string
     */
    protected $dataUrl;

    /**
     * Key of the result array
     * @var string
     */
    protected $dataResultKey;

    /**
     * Key of the name of entity
     * @var string
     */
    protected $dataNameKey;

    /**
     * Key of the children link
     * @var string
     */
    protected $dataChildrenLinkKey;

    /**
     * If true a add button will be shown in data-navigation
     * @var string
     */
    protected $showAddButton;

    /**
     * Key to translate no data available
     * @var string
     */
    protected $noDataTranslationKey = 'sulu.data-navigation.title';

    /**
     * Key to translate root node
     * @var string
     */
    protected $titleTranslationKey = 'sulu.data-navigation.no-data';

    function __construct($name, $dataUrl, $parent = null)
    {
        parent::__construct($name, $parent);

        $this->dataUrl = $dataUrl;
    }


    /**
     * @return string
     */
    public function getDataUrl()
    {
        return $this->dataUrl;
    }

    /**
     * @return string
     */
    public function getDataResultKey()
    {
        return $this->dataResultKey;
    }

    /**
     * @param string $dataResultKey
     */
    public function setDataResultKey($dataResultKey)
    {
        $this->dataResultKey = $dataResultKey;
    }

    /**
     * @return string
     */
    public function getDataNameKey()
    {
        return $this->dataNameKey;
    }

    /**
     * @param string $dataNameKey
     */
    public function setDataNameKey($dataNameKey)
    {
        $this->dataNameKey = $dataNameKey;
    }

    /**
     * @return string
     */
    public function getDataChildrenLinkKey()
    {
        return $this->dataChildrenLinkKey;
    }

    /**
     * @param string $dataChildrenLinkKey
     */
    public function setDataChildrenLinkKey($dataChildrenLinkKey)
    {
        $this->dataChildrenLinkKey = $dataChildrenLinkKey;
    }

    /**
     * @return string
     */
    public function getShowAddButton()
    {
        return $this->showAddButton;
    }

    /**
     * @param string $showAddButton
     */
    public function setShowAddButton($showAddButton)
    {
        $this->showAddButton = $showAddButton;
    }

    /**
     * @return string
     */
    public function getNoDataTranslationKey()
    {
        return $this->noDataTranslationKey;
    }

    /**
     * @param string $noDataTranslationKey
     */
    public function setNoDataTranslationKey($noDataTranslationKey)
    {
        $this->noDataTranslationKey = $noDataTranslationKey;
    }

    /**
     * @return string
     */
    public function getTitleTranslationKey()
    {
        return $this->titleTranslationKey;
    }

    /**
     * @param string $titleTranslationKey
     */
    public function setTitleTranslationKey($titleTranslationKey)
    {
        $this->titleTranslationKey = $titleTranslationKey;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $result = parent::toArray();

        // build options object
        $dataNavigation = array(
            'url' => $this->dataUrl,
            'resultKey' => $this->dataResultKey,
            'nameKey' => $this->dataNameKey,
            'childrenLinkKey' => $this->getDataChildrenLinkKey(),
            'showAddButton' => $this->showAddButton,
            'translates' => array(
                'noData' => $this->noDataTranslationKey,
                'title' => $this->titleTranslationKey
            )
        );

        // not setted values should be removed
        $dataNavigation = array_filter($dataNavigation);
        $result['dataNavigation'] = $dataNavigation;

        return $result;
    }
}
