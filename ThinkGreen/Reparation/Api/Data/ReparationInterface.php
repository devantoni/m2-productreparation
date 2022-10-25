<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace ThinkGreen\Reparation\Api\Data;

interface ReparationInterface
{

    const URL_KEY = 'url_key';
    const SHORT_DESCRIPTION = 'short_description';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const REPARATION_ID = 'reparation_id';
    const IMAGE = 'image';

    /**
     * Get reparation_id
     * @return string|null
     */
    public function getReparationId();

    /**
     * Set reparation_id
     * @param string $reparationId
     * @return \ThinkGreen\Reparation\Reparation\Api\Data\ReparationInterface
     */
    public function setReparationId($reparationId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \ThinkGreen\Reparation\Reparation\Api\Data\ReparationInterface
     */
    public function setName($name);

    /**
     * Get short_description
     * @return string|null
     */
    public function getShortDescription();

    /**
     * Set short_description
     * @param string $shortDescription
     * @return \ThinkGreen\Reparation\Reparation\Api\Data\ReparationInterface
     */
    public function setShortDescription($shortDescription);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \ThinkGreen\Reparation\Reparation\Api\Data\ReparationInterface
     */
    public function setDescription($description);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \ThinkGreen\Reparation\Reparation\Api\Data\ReparationInterface
     */
    public function setImage($image);

    /**
     * Get url_key
     * @return string|null
     */
    public function getUrlKey();

    /**
     * Set url_key
     * @param string $urlKey
     * @return \ThinkGreen\Reparation\Reparation\Api\Data\ReparationInterface
     */
    public function setUrlKey($urlKey);
}

