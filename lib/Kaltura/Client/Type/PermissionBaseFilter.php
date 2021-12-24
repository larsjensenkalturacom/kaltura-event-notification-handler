<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platforms allow them to do with
// text.
//
// Copyright (C) 2006-2021  Kaltura Inc.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// @ignore
// ===================================================================================================

/**
 * @namespace
 */
namespace Kaltura\Client\Type;

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class PermissionBaseFilter extends \Kaltura\Client\Type\RelatedFilter
{
	public function getKalturaObjectType()
	{
		return 'KalturaPermissionBaseFilter';
	}
	
	public function __construct(\SimpleXMLElement $xml = null)
	{
		parent::__construct($xml);
		
		if(is_null($xml))
			return;
		
		if(count($xml->idEqual))
			$this->idEqual = (int)$xml->idEqual;
		if(count($xml->idIn))
			$this->idIn = (string)$xml->idIn;
		if(count($xml->typeEqual))
			$this->typeEqual = (int)$xml->typeEqual;
		if(count($xml->typeIn))
			$this->typeIn = (string)$xml->typeIn;
		if(count($xml->nameEqual))
			$this->nameEqual = (string)$xml->nameEqual;
		if(count($xml->nameIn))
			$this->nameIn = (string)$xml->nameIn;
		if(count($xml->friendlyNameLike))
			$this->friendlyNameLike = (string)$xml->friendlyNameLike;
		if(count($xml->descriptionLike))
			$this->descriptionLike = (string)$xml->descriptionLike;
		if(count($xml->statusEqual))
			$this->statusEqual = (int)$xml->statusEqual;
		if(count($xml->statusIn))
			$this->statusIn = (string)$xml->statusIn;
		if(count($xml->partnerIdEqual))
			$this->partnerIdEqual = (int)$xml->partnerIdEqual;
		if(count($xml->partnerIdIn))
			$this->partnerIdIn = (string)$xml->partnerIdIn;
		if(count($xml->dependsOnPermissionNamesMultiLikeOr))
			$this->dependsOnPermissionNamesMultiLikeOr = (string)$xml->dependsOnPermissionNamesMultiLikeOr;
		if(count($xml->dependsOnPermissionNamesMultiLikeAnd))
			$this->dependsOnPermissionNamesMultiLikeAnd = (string)$xml->dependsOnPermissionNamesMultiLikeAnd;
		if(count($xml->tagsMultiLikeOr))
			$this->tagsMultiLikeOr = (string)$xml->tagsMultiLikeOr;
		if(count($xml->tagsMultiLikeAnd))
			$this->tagsMultiLikeAnd = (string)$xml->tagsMultiLikeAnd;
		if(count($xml->createdAtGreaterThanOrEqual))
			$this->createdAtGreaterThanOrEqual = (int)$xml->createdAtGreaterThanOrEqual;
		if(count($xml->createdAtLessThanOrEqual))
			$this->createdAtLessThanOrEqual = (int)$xml->createdAtLessThanOrEqual;
		if(count($xml->updatedAtGreaterThanOrEqual))
			$this->updatedAtGreaterThanOrEqual = (int)$xml->updatedAtGreaterThanOrEqual;
		if(count($xml->updatedAtLessThanOrEqual))
			$this->updatedAtLessThanOrEqual = (int)$xml->updatedAtLessThanOrEqual;
	}
	/**
	 * 
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 * @var \Kaltura\Client\Enum\PermissionType
	 */
	public $typeEqual = null;

	/**
	 * 
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * 
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * 
	 * @var string
	 */
	public $nameIn = null;

	/**
	 * 
	 * @var string
	 */
	public $friendlyNameLike = null;

	/**
	 * 
	 * @var string
	 */
	public $descriptionLike = null;

	/**
	 * 
	 * @var \Kaltura\Client\Enum\PermissionStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * 
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * 
	 * @var string
	 */
	public $partnerIdIn = null;

	/**
	 * 
	 * @var string
	 */
	public $dependsOnPermissionNamesMultiLikeOr = null;

	/**
	 * 
	 * @var string
	 */
	public $dependsOnPermissionNamesMultiLikeAnd = null;

	/**
	 * 
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * 
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

}
