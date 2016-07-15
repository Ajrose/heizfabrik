<?php

namespace HookCalendar\Model\Map;

use HookCalendar\Model\WorkingTimes;
use HookCalendar\Model\WorkingTimesQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'working_times' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WorkingTimesTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'HookCalendar.Model.Map.WorkingTimesTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'working_times';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HookCalendar\\Model\\WorkingTimes';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HookCalendar.Model.WorkingTimes';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 38;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 38;

    /**
     * the column name for the ID field
     */
    const ID = 'working_times.ID';

    /**
     * the column name for the FOREIGN_ID field
     */
    const FOREIGN_ID = 'working_times.FOREIGN_ID';

    /**
     * the column name for the TYPE field
     */
    const TYPE = 'working_times.TYPE';

    /**
     * the column name for the MONDAY_FROM field
     */
    const MONDAY_FROM = 'working_times.MONDAY_FROM';

    /**
     * the column name for the MONDAY_TO field
     */
    const MONDAY_TO = 'working_times.MONDAY_TO';

    /**
     * the column name for the MONDAY_LUNCH_FROM field
     */
    const MONDAY_LUNCH_FROM = 'working_times.MONDAY_LUNCH_FROM';

    /**
     * the column name for the MONDAY_LUNCH_TO field
     */
    const MONDAY_LUNCH_TO = 'working_times.MONDAY_LUNCH_TO';

    /**
     * the column name for the MONDAY_DAYOFF field
     */
    const MONDAY_DAYOFF = 'working_times.MONDAY_DAYOFF';

    /**
     * the column name for the TUESDAY_FROM field
     */
    const TUESDAY_FROM = 'working_times.TUESDAY_FROM';

    /**
     * the column name for the TUESDAY_TO field
     */
    const TUESDAY_TO = 'working_times.TUESDAY_TO';

    /**
     * the column name for the TUESDAY_LUNCH_FROM field
     */
    const TUESDAY_LUNCH_FROM = 'working_times.TUESDAY_LUNCH_FROM';

    /**
     * the column name for the TUESDAY_LUNCH_TO field
     */
    const TUESDAY_LUNCH_TO = 'working_times.TUESDAY_LUNCH_TO';

    /**
     * the column name for the TUESDAY_DAYOFF field
     */
    const TUESDAY_DAYOFF = 'working_times.TUESDAY_DAYOFF';

    /**
     * the column name for the WEDNESDAY_FROM field
     */
    const WEDNESDAY_FROM = 'working_times.WEDNESDAY_FROM';

    /**
     * the column name for the WEDNESDAY_TO field
     */
    const WEDNESDAY_TO = 'working_times.WEDNESDAY_TO';

    /**
     * the column name for the WEDNESDAY_LUNCH_FROM field
     */
    const WEDNESDAY_LUNCH_FROM = 'working_times.WEDNESDAY_LUNCH_FROM';

    /**
     * the column name for the WEDNESDAY_LUNCH_TO field
     */
    const WEDNESDAY_LUNCH_TO = 'working_times.WEDNESDAY_LUNCH_TO';

    /**
     * the column name for the WEDNESDAY_DAYOFF field
     */
    const WEDNESDAY_DAYOFF = 'working_times.WEDNESDAY_DAYOFF';

    /**
     * the column name for the THURSDAY_FROM field
     */
    const THURSDAY_FROM = 'working_times.THURSDAY_FROM';

    /**
     * the column name for the THURSDAY_TO field
     */
    const THURSDAY_TO = 'working_times.THURSDAY_TO';

    /**
     * the column name for the THURSDAY_LUNCH_FROM field
     */
    const THURSDAY_LUNCH_FROM = 'working_times.THURSDAY_LUNCH_FROM';

    /**
     * the column name for the THURSDAY_LUNCH_TO field
     */
    const THURSDAY_LUNCH_TO = 'working_times.THURSDAY_LUNCH_TO';

    /**
     * the column name for the THURSDAY_DAYOFF field
     */
    const THURSDAY_DAYOFF = 'working_times.THURSDAY_DAYOFF';

    /**
     * the column name for the FRIDAY_FROM field
     */
    const FRIDAY_FROM = 'working_times.FRIDAY_FROM';

    /**
     * the column name for the FRIDAY_TO field
     */
    const FRIDAY_TO = 'working_times.FRIDAY_TO';

    /**
     * the column name for the FRIDAY_LUNCH_FROM field
     */
    const FRIDAY_LUNCH_FROM = 'working_times.FRIDAY_LUNCH_FROM';

    /**
     * the column name for the FRIDAY_LUNCH_TO field
     */
    const FRIDAY_LUNCH_TO = 'working_times.FRIDAY_LUNCH_TO';

    /**
     * the column name for the FRIDAY_DAYOFF field
     */
    const FRIDAY_DAYOFF = 'working_times.FRIDAY_DAYOFF';

    /**
     * the column name for the SATURDAY_FROM field
     */
    const SATURDAY_FROM = 'working_times.SATURDAY_FROM';

    /**
     * the column name for the SATURDAY_TO field
     */
    const SATURDAY_TO = 'working_times.SATURDAY_TO';

    /**
     * the column name for the SATURDAY_LUNCH_FROM field
     */
    const SATURDAY_LUNCH_FROM = 'working_times.SATURDAY_LUNCH_FROM';

    /**
     * the column name for the SATURDAY_LUNCH_TO field
     */
    const SATURDAY_LUNCH_TO = 'working_times.SATURDAY_LUNCH_TO';

    /**
     * the column name for the SATURDAY_DAYOFF field
     */
    const SATURDAY_DAYOFF = 'working_times.SATURDAY_DAYOFF';

    /**
     * the column name for the SUNDAY_FROM field
     */
    const SUNDAY_FROM = 'working_times.SUNDAY_FROM';

    /**
     * the column name for the SUNDAY_TO field
     */
    const SUNDAY_TO = 'working_times.SUNDAY_TO';

    /**
     * the column name for the SUNDAY_LUNCH_FROM field
     */
    const SUNDAY_LUNCH_FROM = 'working_times.SUNDAY_LUNCH_FROM';

    /**
     * the column name for the SUNDAY_LUNCH_TO field
     */
    const SUNDAY_LUNCH_TO = 'working_times.SUNDAY_LUNCH_TO';

    /**
     * the column name for the SUNDAY_DAYOFF field
     */
    const SUNDAY_DAYOFF = 'working_times.SUNDAY_DAYOFF';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'ForeignId', 'Type', 'MondayFrom', 'MondayTo', 'MondayLunchFrom', 'MondayLunchTo', 'MondayDayoff', 'TuesdayFrom', 'TuesdayTo', 'TuesdayLunchFrom', 'TuesdayLunchTo', 'TuesdayDayoff', 'WednesdayFrom', 'WednesdayTo', 'WednesdayLunchFrom', 'WednesdayLunchTo', 'WednesdayDayoff', 'ThursdayFrom', 'ThursdayTo', 'ThursdayLunchFrom', 'ThursdayLunchTo', 'ThursdayDayoff', 'FridayFrom', 'FridayTo', 'FridayLunchFrom', 'FridayLunchTo', 'FridayDayoff', 'SaturdayFrom', 'SaturdayTo', 'SaturdayLunchFrom', 'SaturdayLunchTo', 'SaturdayDayoff', 'SundayFrom', 'SundayTo', 'SundayLunchFrom', 'SundayLunchTo', 'SundayDayoff', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'foreignId', 'type', 'mondayFrom', 'mondayTo', 'mondayLunchFrom', 'mondayLunchTo', 'mondayDayoff', 'tuesdayFrom', 'tuesdayTo', 'tuesdayLunchFrom', 'tuesdayLunchTo', 'tuesdayDayoff', 'wednesdayFrom', 'wednesdayTo', 'wednesdayLunchFrom', 'wednesdayLunchTo', 'wednesdayDayoff', 'thursdayFrom', 'thursdayTo', 'thursdayLunchFrom', 'thursdayLunchTo', 'thursdayDayoff', 'fridayFrom', 'fridayTo', 'fridayLunchFrom', 'fridayLunchTo', 'fridayDayoff', 'saturdayFrom', 'saturdayTo', 'saturdayLunchFrom', 'saturdayLunchTo', 'saturdayDayoff', 'sundayFrom', 'sundayTo', 'sundayLunchFrom', 'sundayLunchTo', 'sundayDayoff', ),
        self::TYPE_COLNAME       => array(WorkingTimesTableMap::ID, WorkingTimesTableMap::FOREIGN_ID, WorkingTimesTableMap::TYPE, WorkingTimesTableMap::MONDAY_FROM, WorkingTimesTableMap::MONDAY_TO, WorkingTimesTableMap::MONDAY_LUNCH_FROM, WorkingTimesTableMap::MONDAY_LUNCH_TO, WorkingTimesTableMap::MONDAY_DAYOFF, WorkingTimesTableMap::TUESDAY_FROM, WorkingTimesTableMap::TUESDAY_TO, WorkingTimesTableMap::TUESDAY_LUNCH_FROM, WorkingTimesTableMap::TUESDAY_LUNCH_TO, WorkingTimesTableMap::TUESDAY_DAYOFF, WorkingTimesTableMap::WEDNESDAY_FROM, WorkingTimesTableMap::WEDNESDAY_TO, WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM, WorkingTimesTableMap::WEDNESDAY_LUNCH_TO, WorkingTimesTableMap::WEDNESDAY_DAYOFF, WorkingTimesTableMap::THURSDAY_FROM, WorkingTimesTableMap::THURSDAY_TO, WorkingTimesTableMap::THURSDAY_LUNCH_FROM, WorkingTimesTableMap::THURSDAY_LUNCH_TO, WorkingTimesTableMap::THURSDAY_DAYOFF, WorkingTimesTableMap::FRIDAY_FROM, WorkingTimesTableMap::FRIDAY_TO, WorkingTimesTableMap::FRIDAY_LUNCH_FROM, WorkingTimesTableMap::FRIDAY_LUNCH_TO, WorkingTimesTableMap::FRIDAY_DAYOFF, WorkingTimesTableMap::SATURDAY_FROM, WorkingTimesTableMap::SATURDAY_TO, WorkingTimesTableMap::SATURDAY_LUNCH_FROM, WorkingTimesTableMap::SATURDAY_LUNCH_TO, WorkingTimesTableMap::SATURDAY_DAYOFF, WorkingTimesTableMap::SUNDAY_FROM, WorkingTimesTableMap::SUNDAY_TO, WorkingTimesTableMap::SUNDAY_LUNCH_FROM, WorkingTimesTableMap::SUNDAY_LUNCH_TO, WorkingTimesTableMap::SUNDAY_DAYOFF, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'FOREIGN_ID', 'TYPE', 'MONDAY_FROM', 'MONDAY_TO', 'MONDAY_LUNCH_FROM', 'MONDAY_LUNCH_TO', 'MONDAY_DAYOFF', 'TUESDAY_FROM', 'TUESDAY_TO', 'TUESDAY_LUNCH_FROM', 'TUESDAY_LUNCH_TO', 'TUESDAY_DAYOFF', 'WEDNESDAY_FROM', 'WEDNESDAY_TO', 'WEDNESDAY_LUNCH_FROM', 'WEDNESDAY_LUNCH_TO', 'WEDNESDAY_DAYOFF', 'THURSDAY_FROM', 'THURSDAY_TO', 'THURSDAY_LUNCH_FROM', 'THURSDAY_LUNCH_TO', 'THURSDAY_DAYOFF', 'FRIDAY_FROM', 'FRIDAY_TO', 'FRIDAY_LUNCH_FROM', 'FRIDAY_LUNCH_TO', 'FRIDAY_DAYOFF', 'SATURDAY_FROM', 'SATURDAY_TO', 'SATURDAY_LUNCH_FROM', 'SATURDAY_LUNCH_TO', 'SATURDAY_DAYOFF', 'SUNDAY_FROM', 'SUNDAY_TO', 'SUNDAY_LUNCH_FROM', 'SUNDAY_LUNCH_TO', 'SUNDAY_DAYOFF', ),
        self::TYPE_FIELDNAME     => array('id', 'foreign_id', 'type', 'monday_from', 'monday_to', 'monday_lunch_from', 'monday_lunch_to', 'monday_dayoff', 'tuesday_from', 'tuesday_to', 'tuesday_lunch_from', 'tuesday_lunch_to', 'tuesday_dayoff', 'wednesday_from', 'wednesday_to', 'wednesday_lunch_from', 'wednesday_lunch_to', 'wednesday_dayoff', 'thursday_from', 'thursday_to', 'thursday_lunch_from', 'thursday_lunch_to', 'thursday_dayoff', 'friday_from', 'friday_to', 'friday_lunch_from', 'friday_lunch_to', 'friday_dayoff', 'saturday_from', 'saturday_to', 'saturday_lunch_from', 'saturday_lunch_to', 'saturday_dayoff', 'sunday_from', 'sunday_to', 'sunday_lunch_from', 'sunday_lunch_to', 'sunday_dayoff', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ForeignId' => 1, 'Type' => 2, 'MondayFrom' => 3, 'MondayTo' => 4, 'MondayLunchFrom' => 5, 'MondayLunchTo' => 6, 'MondayDayoff' => 7, 'TuesdayFrom' => 8, 'TuesdayTo' => 9, 'TuesdayLunchFrom' => 10, 'TuesdayLunchTo' => 11, 'TuesdayDayoff' => 12, 'WednesdayFrom' => 13, 'WednesdayTo' => 14, 'WednesdayLunchFrom' => 15, 'WednesdayLunchTo' => 16, 'WednesdayDayoff' => 17, 'ThursdayFrom' => 18, 'ThursdayTo' => 19, 'ThursdayLunchFrom' => 20, 'ThursdayLunchTo' => 21, 'ThursdayDayoff' => 22, 'FridayFrom' => 23, 'FridayTo' => 24, 'FridayLunchFrom' => 25, 'FridayLunchTo' => 26, 'FridayDayoff' => 27, 'SaturdayFrom' => 28, 'SaturdayTo' => 29, 'SaturdayLunchFrom' => 30, 'SaturdayLunchTo' => 31, 'SaturdayDayoff' => 32, 'SundayFrom' => 33, 'SundayTo' => 34, 'SundayLunchFrom' => 35, 'SundayLunchTo' => 36, 'SundayDayoff' => 37, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'foreignId' => 1, 'type' => 2, 'mondayFrom' => 3, 'mondayTo' => 4, 'mondayLunchFrom' => 5, 'mondayLunchTo' => 6, 'mondayDayoff' => 7, 'tuesdayFrom' => 8, 'tuesdayTo' => 9, 'tuesdayLunchFrom' => 10, 'tuesdayLunchTo' => 11, 'tuesdayDayoff' => 12, 'wednesdayFrom' => 13, 'wednesdayTo' => 14, 'wednesdayLunchFrom' => 15, 'wednesdayLunchTo' => 16, 'wednesdayDayoff' => 17, 'thursdayFrom' => 18, 'thursdayTo' => 19, 'thursdayLunchFrom' => 20, 'thursdayLunchTo' => 21, 'thursdayDayoff' => 22, 'fridayFrom' => 23, 'fridayTo' => 24, 'fridayLunchFrom' => 25, 'fridayLunchTo' => 26, 'fridayDayoff' => 27, 'saturdayFrom' => 28, 'saturdayTo' => 29, 'saturdayLunchFrom' => 30, 'saturdayLunchTo' => 31, 'saturdayDayoff' => 32, 'sundayFrom' => 33, 'sundayTo' => 34, 'sundayLunchFrom' => 35, 'sundayLunchTo' => 36, 'sundayDayoff' => 37, ),
        self::TYPE_COLNAME       => array(WorkingTimesTableMap::ID => 0, WorkingTimesTableMap::FOREIGN_ID => 1, WorkingTimesTableMap::TYPE => 2, WorkingTimesTableMap::MONDAY_FROM => 3, WorkingTimesTableMap::MONDAY_TO => 4, WorkingTimesTableMap::MONDAY_LUNCH_FROM => 5, WorkingTimesTableMap::MONDAY_LUNCH_TO => 6, WorkingTimesTableMap::MONDAY_DAYOFF => 7, WorkingTimesTableMap::TUESDAY_FROM => 8, WorkingTimesTableMap::TUESDAY_TO => 9, WorkingTimesTableMap::TUESDAY_LUNCH_FROM => 10, WorkingTimesTableMap::TUESDAY_LUNCH_TO => 11, WorkingTimesTableMap::TUESDAY_DAYOFF => 12, WorkingTimesTableMap::WEDNESDAY_FROM => 13, WorkingTimesTableMap::WEDNESDAY_TO => 14, WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM => 15, WorkingTimesTableMap::WEDNESDAY_LUNCH_TO => 16, WorkingTimesTableMap::WEDNESDAY_DAYOFF => 17, WorkingTimesTableMap::THURSDAY_FROM => 18, WorkingTimesTableMap::THURSDAY_TO => 19, WorkingTimesTableMap::THURSDAY_LUNCH_FROM => 20, WorkingTimesTableMap::THURSDAY_LUNCH_TO => 21, WorkingTimesTableMap::THURSDAY_DAYOFF => 22, WorkingTimesTableMap::FRIDAY_FROM => 23, WorkingTimesTableMap::FRIDAY_TO => 24, WorkingTimesTableMap::FRIDAY_LUNCH_FROM => 25, WorkingTimesTableMap::FRIDAY_LUNCH_TO => 26, WorkingTimesTableMap::FRIDAY_DAYOFF => 27, WorkingTimesTableMap::SATURDAY_FROM => 28, WorkingTimesTableMap::SATURDAY_TO => 29, WorkingTimesTableMap::SATURDAY_LUNCH_FROM => 30, WorkingTimesTableMap::SATURDAY_LUNCH_TO => 31, WorkingTimesTableMap::SATURDAY_DAYOFF => 32, WorkingTimesTableMap::SUNDAY_FROM => 33, WorkingTimesTableMap::SUNDAY_TO => 34, WorkingTimesTableMap::SUNDAY_LUNCH_FROM => 35, WorkingTimesTableMap::SUNDAY_LUNCH_TO => 36, WorkingTimesTableMap::SUNDAY_DAYOFF => 37, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'FOREIGN_ID' => 1, 'TYPE' => 2, 'MONDAY_FROM' => 3, 'MONDAY_TO' => 4, 'MONDAY_LUNCH_FROM' => 5, 'MONDAY_LUNCH_TO' => 6, 'MONDAY_DAYOFF' => 7, 'TUESDAY_FROM' => 8, 'TUESDAY_TO' => 9, 'TUESDAY_LUNCH_FROM' => 10, 'TUESDAY_LUNCH_TO' => 11, 'TUESDAY_DAYOFF' => 12, 'WEDNESDAY_FROM' => 13, 'WEDNESDAY_TO' => 14, 'WEDNESDAY_LUNCH_FROM' => 15, 'WEDNESDAY_LUNCH_TO' => 16, 'WEDNESDAY_DAYOFF' => 17, 'THURSDAY_FROM' => 18, 'THURSDAY_TO' => 19, 'THURSDAY_LUNCH_FROM' => 20, 'THURSDAY_LUNCH_TO' => 21, 'THURSDAY_DAYOFF' => 22, 'FRIDAY_FROM' => 23, 'FRIDAY_TO' => 24, 'FRIDAY_LUNCH_FROM' => 25, 'FRIDAY_LUNCH_TO' => 26, 'FRIDAY_DAYOFF' => 27, 'SATURDAY_FROM' => 28, 'SATURDAY_TO' => 29, 'SATURDAY_LUNCH_FROM' => 30, 'SATURDAY_LUNCH_TO' => 31, 'SATURDAY_DAYOFF' => 32, 'SUNDAY_FROM' => 33, 'SUNDAY_TO' => 34, 'SUNDAY_LUNCH_FROM' => 35, 'SUNDAY_LUNCH_TO' => 36, 'SUNDAY_DAYOFF' => 37, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'foreign_id' => 1, 'type' => 2, 'monday_from' => 3, 'monday_to' => 4, 'monday_lunch_from' => 5, 'monday_lunch_to' => 6, 'monday_dayoff' => 7, 'tuesday_from' => 8, 'tuesday_to' => 9, 'tuesday_lunch_from' => 10, 'tuesday_lunch_to' => 11, 'tuesday_dayoff' => 12, 'wednesday_from' => 13, 'wednesday_to' => 14, 'wednesday_lunch_from' => 15, 'wednesday_lunch_to' => 16, 'wednesday_dayoff' => 17, 'thursday_from' => 18, 'thursday_to' => 19, 'thursday_lunch_from' => 20, 'thursday_lunch_to' => 21, 'thursday_dayoff' => 22, 'friday_from' => 23, 'friday_to' => 24, 'friday_lunch_from' => 25, 'friday_lunch_to' => 26, 'friday_dayoff' => 27, 'saturday_from' => 28, 'saturday_to' => 29, 'saturday_lunch_from' => 30, 'saturday_lunch_to' => 31, 'saturday_dayoff' => 32, 'sunday_from' => 33, 'sunday_to' => 34, 'sunday_lunch_from' => 35, 'sunday_lunch_to' => 36, 'sunday_dayoff' => 37, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('working_times');
        $this->setPhpName('WorkingTimes');
        $this->setClassName('\\HookCalendar\\Model\\WorkingTimes');
        $this->setPackage('HookCalendar.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('FOREIGN_ID', 'ForeignId', 'INTEGER', false, 10, null);
        $this->addColumn('TYPE', 'Type', 'CHAR', false, null, null);
        $this->addColumn('MONDAY_FROM', 'MondayFrom', 'TIME', false, null, null);
        $this->addColumn('MONDAY_TO', 'MondayTo', 'TIME', false, null, null);
        $this->addColumn('MONDAY_LUNCH_FROM', 'MondayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('MONDAY_LUNCH_TO', 'MondayLunchTo', 'TIME', false, null, null);
        $this->addColumn('MONDAY_DAYOFF', 'MondayDayoff', 'CHAR', false, null, 'F');
        $this->addColumn('TUESDAY_FROM', 'TuesdayFrom', 'TIME', false, null, null);
        $this->addColumn('TUESDAY_TO', 'TuesdayTo', 'TIME', false, null, null);
        $this->addColumn('TUESDAY_LUNCH_FROM', 'TuesdayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('TUESDAY_LUNCH_TO', 'TuesdayLunchTo', 'TIME', false, null, null);
        $this->addColumn('TUESDAY_DAYOFF', 'TuesdayDayoff', 'CHAR', false, null, 'F');
        $this->addColumn('WEDNESDAY_FROM', 'WednesdayFrom', 'TIME', false, null, null);
        $this->addColumn('WEDNESDAY_TO', 'WednesdayTo', 'TIME', false, null, null);
        $this->addColumn('WEDNESDAY_LUNCH_FROM', 'WednesdayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('WEDNESDAY_LUNCH_TO', 'WednesdayLunchTo', 'TIME', false, null, null);
        $this->addColumn('WEDNESDAY_DAYOFF', 'WednesdayDayoff', 'CHAR', false, null, 'F');
        $this->addColumn('THURSDAY_FROM', 'ThursdayFrom', 'TIME', false, null, null);
        $this->addColumn('THURSDAY_TO', 'ThursdayTo', 'TIME', false, null, null);
        $this->addColumn('THURSDAY_LUNCH_FROM', 'ThursdayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('THURSDAY_LUNCH_TO', 'ThursdayLunchTo', 'TIME', false, null, null);
        $this->addColumn('THURSDAY_DAYOFF', 'ThursdayDayoff', 'CHAR', false, null, 'F');
        $this->addColumn('FRIDAY_FROM', 'FridayFrom', 'TIME', false, null, null);
        $this->addColumn('FRIDAY_TO', 'FridayTo', 'TIME', false, null, null);
        $this->addColumn('FRIDAY_LUNCH_FROM', 'FridayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('FRIDAY_LUNCH_TO', 'FridayLunchTo', 'TIME', false, null, null);
        $this->addColumn('FRIDAY_DAYOFF', 'FridayDayoff', 'CHAR', false, null, 'F');
        $this->addColumn('SATURDAY_FROM', 'SaturdayFrom', 'TIME', false, null, null);
        $this->addColumn('SATURDAY_TO', 'SaturdayTo', 'TIME', false, null, null);
        $this->addColumn('SATURDAY_LUNCH_FROM', 'SaturdayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('SATURDAY_LUNCH_TO', 'SaturdayLunchTo', 'TIME', false, null, null);
        $this->addColumn('SATURDAY_DAYOFF', 'SaturdayDayoff', 'CHAR', false, null, 'F');
        $this->addColumn('SUNDAY_FROM', 'SundayFrom', 'TIME', false, null, null);
        $this->addColumn('SUNDAY_TO', 'SundayTo', 'TIME', false, null, null);
        $this->addColumn('SUNDAY_LUNCH_FROM', 'SundayLunchFrom', 'TIME', false, null, null);
        $this->addColumn('SUNDAY_LUNCH_TO', 'SundayLunchTo', 'TIME', false, null, null);
        $this->addColumn('SUNDAY_DAYOFF', 'SundayDayoff', 'CHAR', false, null, 'F');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? WorkingTimesTableMap::CLASS_DEFAULT : WorkingTimesTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (WorkingTimes object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WorkingTimesTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WorkingTimesTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WorkingTimesTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WorkingTimesTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WorkingTimesTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = WorkingTimesTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WorkingTimesTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WorkingTimesTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(WorkingTimesTableMap::ID);
            $criteria->addSelectColumn(WorkingTimesTableMap::FOREIGN_ID);
            $criteria->addSelectColumn(WorkingTimesTableMap::TYPE);
            $criteria->addSelectColumn(WorkingTimesTableMap::MONDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::MONDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::MONDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::MONDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::MONDAY_DAYOFF);
            $criteria->addSelectColumn(WorkingTimesTableMap::TUESDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::TUESDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::TUESDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::TUESDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::TUESDAY_DAYOFF);
            $criteria->addSelectColumn(WorkingTimesTableMap::WEDNESDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::WEDNESDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::WEDNESDAY_DAYOFF);
            $criteria->addSelectColumn(WorkingTimesTableMap::THURSDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::THURSDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::THURSDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::THURSDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::THURSDAY_DAYOFF);
            $criteria->addSelectColumn(WorkingTimesTableMap::FRIDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::FRIDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::FRIDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::FRIDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::FRIDAY_DAYOFF);
            $criteria->addSelectColumn(WorkingTimesTableMap::SATURDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::SATURDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::SATURDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::SATURDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::SATURDAY_DAYOFF);
            $criteria->addSelectColumn(WorkingTimesTableMap::SUNDAY_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::SUNDAY_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::SUNDAY_LUNCH_FROM);
            $criteria->addSelectColumn(WorkingTimesTableMap::SUNDAY_LUNCH_TO);
            $criteria->addSelectColumn(WorkingTimesTableMap::SUNDAY_DAYOFF);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.FOREIGN_ID');
            $criteria->addSelectColumn($alias . '.TYPE');
            $criteria->addSelectColumn($alias . '.MONDAY_FROM');
            $criteria->addSelectColumn($alias . '.MONDAY_TO');
            $criteria->addSelectColumn($alias . '.MONDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.MONDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.MONDAY_DAYOFF');
            $criteria->addSelectColumn($alias . '.TUESDAY_FROM');
            $criteria->addSelectColumn($alias . '.TUESDAY_TO');
            $criteria->addSelectColumn($alias . '.TUESDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.TUESDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.TUESDAY_DAYOFF');
            $criteria->addSelectColumn($alias . '.WEDNESDAY_FROM');
            $criteria->addSelectColumn($alias . '.WEDNESDAY_TO');
            $criteria->addSelectColumn($alias . '.WEDNESDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.WEDNESDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.WEDNESDAY_DAYOFF');
            $criteria->addSelectColumn($alias . '.THURSDAY_FROM');
            $criteria->addSelectColumn($alias . '.THURSDAY_TO');
            $criteria->addSelectColumn($alias . '.THURSDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.THURSDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.THURSDAY_DAYOFF');
            $criteria->addSelectColumn($alias . '.FRIDAY_FROM');
            $criteria->addSelectColumn($alias . '.FRIDAY_TO');
            $criteria->addSelectColumn($alias . '.FRIDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.FRIDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.FRIDAY_DAYOFF');
            $criteria->addSelectColumn($alias . '.SATURDAY_FROM');
            $criteria->addSelectColumn($alias . '.SATURDAY_TO');
            $criteria->addSelectColumn($alias . '.SATURDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.SATURDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.SATURDAY_DAYOFF');
            $criteria->addSelectColumn($alias . '.SUNDAY_FROM');
            $criteria->addSelectColumn($alias . '.SUNDAY_TO');
            $criteria->addSelectColumn($alias . '.SUNDAY_LUNCH_FROM');
            $criteria->addSelectColumn($alias . '.SUNDAY_LUNCH_TO');
            $criteria->addSelectColumn($alias . '.SUNDAY_DAYOFF');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(WorkingTimesTableMap::DATABASE_NAME)->getTable(WorkingTimesTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(WorkingTimesTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(WorkingTimesTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new WorkingTimesTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a WorkingTimes or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or WorkingTimes object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WorkingTimesTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HookCalendar\Model\WorkingTimes) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WorkingTimesTableMap::DATABASE_NAME);
            $criteria->add(WorkingTimesTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = WorkingTimesQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { WorkingTimesTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { WorkingTimesTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the working_times table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WorkingTimesQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a WorkingTimes or Criteria object.
     *
     * @param mixed               $criteria Criteria or WorkingTimes object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WorkingTimesTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from WorkingTimes object
        }

        if ($criteria->containsKey(WorkingTimesTableMap::ID) && $criteria->keyContainsValue(WorkingTimesTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.WorkingTimesTableMap::ID.')');
        }


        // Set the correct dbName
        $query = WorkingTimesQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // WorkingTimesTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WorkingTimesTableMap::buildTableMap();
