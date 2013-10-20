<?php


/**
 * This class defines the structure of the 'vehicle' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/20/13 17:54:43
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class VehicleTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.VehicleTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('vehicle');
		$this->setPhpName('Vehicle');
		$this->setClassname('Vehicle');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 500, null);
		$this->addForeignKey('MARK_ID', 'MarkId', 'INTEGER', 'mark', 'ID', true, null, null);
		$this->addForeignKey('VECHICLE_TYPE_ID', 'VechicleTypeId', 'INTEGER', 'vehicle_type', 'ID', true, null, null);
		$this->addColumn('MODEL', 'Model', 'VARCHAR', true, 50, null);
		$this->addColumn('PLATE', 'Plate', 'VARCHAR', true, 10, null);
		$this->addColumn('CAPACITY', 'Capacity', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Mark', 'Mark', RelationMap::MANY_TO_ONE, array('mark_id' => 'id', ), null, null);
    $this->addRelation('VehicleType', 'VehicleType', RelationMap::MANY_TO_ONE, array('vechicle_type_id' => 'id', ), null, null);
    $this->addRelation('DriverVehicle', 'DriverVehicle', RelationMap::ONE_TO_MANY, array('id' => 'vehicle_id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // VehicleTableMap
