<?php

namespace HookCalendar\Model\Map;

use HookCalendar\Model\Bookings;
use HookCalendar\Model\BookingsQuery;
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
 * This class defines the structure of the 'bookings' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BookingsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'HookCalendar.Model.Map.BookingsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'bookings';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\HookCalendar\\Model\\Bookings';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'HookCalendar.Model.Bookings';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 30;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 30;

    /**
     * the column name for the ID field
     */
    const ID = 'bookings.ID';

    /**
     * the column name for the UUID field
     */
    const UUID = 'bookings.UUID';

    /**
     * the column name for the CALENDAR_ID field
     */
    const CALENDAR_ID = 'bookings.CALENDAR_ID';

    /**
     * the column name for the BOOKING_PRICE field
     */
    const BOOKING_PRICE = 'bookings.BOOKING_PRICE';

    /**
     * the column name for the BOOKING_TOTAL field
     */
    const BOOKING_TOTAL = 'bookings.BOOKING_TOTAL';

    /**
     * the column name for the BOOKING_DEPOSIT field
     */
    const BOOKING_DEPOSIT = 'bookings.BOOKING_DEPOSIT';

    /**
     * the column name for the BOOKING_TAX field
     */
    const BOOKING_TAX = 'bookings.BOOKING_TAX';

    /**
     * the column name for the BOOKING_STATUS field
     */
    const BOOKING_STATUS = 'bookings.BOOKING_STATUS';

    /**
     * the column name for the PAYMENT_METHOD field
     */
    const PAYMENT_METHOD = 'bookings.PAYMENT_METHOD';

    /**
     * the column name for the C_NAME field
     */
    const C_NAME = 'bookings.C_NAME';

    /**
     * the column name for the C_EMAIL field
     */
    const C_EMAIL = 'bookings.C_EMAIL';

    /**
     * the column name for the C_PHONE field
     */
    const C_PHONE = 'bookings.C_PHONE';

    /**
     * the column name for the C_COUNTRY_ID field
     */
    const C_COUNTRY_ID = 'bookings.C_COUNTRY_ID';

    /**
     * the column name for the C_CITY field
     */
    const C_CITY = 'bookings.C_CITY';

    /**
     * the column name for the C_STATE field
     */
    const C_STATE = 'bookings.C_STATE';

    /**
     * the column name for the C_ZIP field
     */
    const C_ZIP = 'bookings.C_ZIP';

    /**
     * the column name for the C_ADDRESS_1 field
     */
    const C_ADDRESS_1 = 'bookings.C_ADDRESS_1';

    /**
     * the column name for the C_ADDRESS_2 field
     */
    const C_ADDRESS_2 = 'bookings.C_ADDRESS_2';

    /**
     * the column name for the C_NOTES field
     */
    const C_NOTES = 'bookings.C_NOTES';

    /**
     * the column name for the CC_TYPE field
     */
    const CC_TYPE = 'bookings.CC_TYPE';

    /**
     * the column name for the CC_NUM field
     */
    const CC_NUM = 'bookings.CC_NUM';

    /**
     * the column name for the CC_EXP_YEAR field
     */
    const CC_EXP_YEAR = 'bookings.CC_EXP_YEAR';

    /**
     * the column name for the CC_EXP_MONTH field
     */
    const CC_EXP_MONTH = 'bookings.CC_EXP_MONTH';

    /**
     * the column name for the CC_CODE field
     */
    const CC_CODE = 'bookings.CC_CODE';

    /**
     * the column name for the TXN_ID field
     */
    const TXN_ID = 'bookings.TXN_ID';

    /**
     * the column name for the PROCESSED_ON field
     */
    const PROCESSED_ON = 'bookings.PROCESSED_ON';

    /**
     * the column name for the CREATED field
     */
    const CREATED = 'bookings.CREATED';

    /**
     * the column name for the MODIFIED field
     */
    const MODIFIED = 'bookings.MODIFIED';

    /**
     * the column name for the LOCALE_ID field
     */
    const LOCALE_ID = 'bookings.LOCALE_ID';

    /**
     * the column name for the IP field
     */
    const IP = 'bookings.IP';

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
        self::TYPE_PHPNAME       => array('Id', 'Uuid', 'CalendarId', 'BookingPrice', 'BookingTotal', 'BookingDeposit', 'BookingTax', 'BookingStatus', 'PaymentMethod', 'CName', 'CEmail', 'CPhone', 'CCountryId', 'CCity', 'CState', 'CZip', 'CAddress1', 'CAddress2', 'CNotes', 'CcType', 'CcNum', 'CcExpYear', 'CcExpMonth', 'CcCode', 'TxnId', 'ProcessedOn', 'Created', 'Modified', 'LocaleId', 'Ip', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'uuid', 'calendarId', 'bookingPrice', 'bookingTotal', 'bookingDeposit', 'bookingTax', 'bookingStatus', 'paymentMethod', 'cName', 'cEmail', 'cPhone', 'cCountryId', 'cCity', 'cState', 'cZip', 'cAddress1', 'cAddress2', 'cNotes', 'ccType', 'ccNum', 'ccExpYear', 'ccExpMonth', 'ccCode', 'txnId', 'processedOn', 'created', 'modified', 'localeId', 'ip', ),
        self::TYPE_COLNAME       => array(BookingsTableMap::ID, BookingsTableMap::UUID, BookingsTableMap::CALENDAR_ID, BookingsTableMap::BOOKING_PRICE, BookingsTableMap::BOOKING_TOTAL, BookingsTableMap::BOOKING_DEPOSIT, BookingsTableMap::BOOKING_TAX, BookingsTableMap::BOOKING_STATUS, BookingsTableMap::PAYMENT_METHOD, BookingsTableMap::C_NAME, BookingsTableMap::C_EMAIL, BookingsTableMap::C_PHONE, BookingsTableMap::C_COUNTRY_ID, BookingsTableMap::C_CITY, BookingsTableMap::C_STATE, BookingsTableMap::C_ZIP, BookingsTableMap::C_ADDRESS_1, BookingsTableMap::C_ADDRESS_2, BookingsTableMap::C_NOTES, BookingsTableMap::CC_TYPE, BookingsTableMap::CC_NUM, BookingsTableMap::CC_EXP_YEAR, BookingsTableMap::CC_EXP_MONTH, BookingsTableMap::CC_CODE, BookingsTableMap::TXN_ID, BookingsTableMap::PROCESSED_ON, BookingsTableMap::CREATED, BookingsTableMap::MODIFIED, BookingsTableMap::LOCALE_ID, BookingsTableMap::IP, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'UUID', 'CALENDAR_ID', 'BOOKING_PRICE', 'BOOKING_TOTAL', 'BOOKING_DEPOSIT', 'BOOKING_TAX', 'BOOKING_STATUS', 'PAYMENT_METHOD', 'C_NAME', 'C_EMAIL', 'C_PHONE', 'C_COUNTRY_ID', 'C_CITY', 'C_STATE', 'C_ZIP', 'C_ADDRESS_1', 'C_ADDRESS_2', 'C_NOTES', 'CC_TYPE', 'CC_NUM', 'CC_EXP_YEAR', 'CC_EXP_MONTH', 'CC_CODE', 'TXN_ID', 'PROCESSED_ON', 'CREATED', 'MODIFIED', 'LOCALE_ID', 'IP', ),
        self::TYPE_FIELDNAME     => array('id', 'uuid', 'calendar_id', 'booking_price', 'booking_total', 'booking_deposit', 'booking_tax', 'booking_status', 'payment_method', 'c_name', 'c_email', 'c_phone', 'c_country_id', 'c_city', 'c_state', 'c_zip', 'c_address_1', 'c_address_2', 'c_notes', 'cc_type', 'cc_num', 'cc_exp_year', 'cc_exp_month', 'cc_code', 'txn_id', 'processed_on', 'created', 'modified', 'locale_id', 'ip', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Uuid' => 1, 'CalendarId' => 2, 'BookingPrice' => 3, 'BookingTotal' => 4, 'BookingDeposit' => 5, 'BookingTax' => 6, 'BookingStatus' => 7, 'PaymentMethod' => 8, 'CName' => 9, 'CEmail' => 10, 'CPhone' => 11, 'CCountryId' => 12, 'CCity' => 13, 'CState' => 14, 'CZip' => 15, 'CAddress1' => 16, 'CAddress2' => 17, 'CNotes' => 18, 'CcType' => 19, 'CcNum' => 20, 'CcExpYear' => 21, 'CcExpMonth' => 22, 'CcCode' => 23, 'TxnId' => 24, 'ProcessedOn' => 25, 'Created' => 26, 'Modified' => 27, 'LocaleId' => 28, 'Ip' => 29, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'uuid' => 1, 'calendarId' => 2, 'bookingPrice' => 3, 'bookingTotal' => 4, 'bookingDeposit' => 5, 'bookingTax' => 6, 'bookingStatus' => 7, 'paymentMethod' => 8, 'cName' => 9, 'cEmail' => 10, 'cPhone' => 11, 'cCountryId' => 12, 'cCity' => 13, 'cState' => 14, 'cZip' => 15, 'cAddress1' => 16, 'cAddress2' => 17, 'cNotes' => 18, 'ccType' => 19, 'ccNum' => 20, 'ccExpYear' => 21, 'ccExpMonth' => 22, 'ccCode' => 23, 'txnId' => 24, 'processedOn' => 25, 'created' => 26, 'modified' => 27, 'localeId' => 28, 'ip' => 29, ),
        self::TYPE_COLNAME       => array(BookingsTableMap::ID => 0, BookingsTableMap::UUID => 1, BookingsTableMap::CALENDAR_ID => 2, BookingsTableMap::BOOKING_PRICE => 3, BookingsTableMap::BOOKING_TOTAL => 4, BookingsTableMap::BOOKING_DEPOSIT => 5, BookingsTableMap::BOOKING_TAX => 6, BookingsTableMap::BOOKING_STATUS => 7, BookingsTableMap::PAYMENT_METHOD => 8, BookingsTableMap::C_NAME => 9, BookingsTableMap::C_EMAIL => 10, BookingsTableMap::C_PHONE => 11, BookingsTableMap::C_COUNTRY_ID => 12, BookingsTableMap::C_CITY => 13, BookingsTableMap::C_STATE => 14, BookingsTableMap::C_ZIP => 15, BookingsTableMap::C_ADDRESS_1 => 16, BookingsTableMap::C_ADDRESS_2 => 17, BookingsTableMap::C_NOTES => 18, BookingsTableMap::CC_TYPE => 19, BookingsTableMap::CC_NUM => 20, BookingsTableMap::CC_EXP_YEAR => 21, BookingsTableMap::CC_EXP_MONTH => 22, BookingsTableMap::CC_CODE => 23, BookingsTableMap::TXN_ID => 24, BookingsTableMap::PROCESSED_ON => 25, BookingsTableMap::CREATED => 26, BookingsTableMap::MODIFIED => 27, BookingsTableMap::LOCALE_ID => 28, BookingsTableMap::IP => 29, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'UUID' => 1, 'CALENDAR_ID' => 2, 'BOOKING_PRICE' => 3, 'BOOKING_TOTAL' => 4, 'BOOKING_DEPOSIT' => 5, 'BOOKING_TAX' => 6, 'BOOKING_STATUS' => 7, 'PAYMENT_METHOD' => 8, 'C_NAME' => 9, 'C_EMAIL' => 10, 'C_PHONE' => 11, 'C_COUNTRY_ID' => 12, 'C_CITY' => 13, 'C_STATE' => 14, 'C_ZIP' => 15, 'C_ADDRESS_1' => 16, 'C_ADDRESS_2' => 17, 'C_NOTES' => 18, 'CC_TYPE' => 19, 'CC_NUM' => 20, 'CC_EXP_YEAR' => 21, 'CC_EXP_MONTH' => 22, 'CC_CODE' => 23, 'TXN_ID' => 24, 'PROCESSED_ON' => 25, 'CREATED' => 26, 'MODIFIED' => 27, 'LOCALE_ID' => 28, 'IP' => 29, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'uuid' => 1, 'calendar_id' => 2, 'booking_price' => 3, 'booking_total' => 4, 'booking_deposit' => 5, 'booking_tax' => 6, 'booking_status' => 7, 'payment_method' => 8, 'c_name' => 9, 'c_email' => 10, 'c_phone' => 11, 'c_country_id' => 12, 'c_city' => 13, 'c_state' => 14, 'c_zip' => 15, 'c_address_1' => 16, 'c_address_2' => 17, 'c_notes' => 18, 'cc_type' => 19, 'cc_num' => 20, 'cc_exp_year' => 21, 'cc_exp_month' => 22, 'cc_code' => 23, 'txn_id' => 24, 'processed_on' => 25, 'created' => 26, 'modified' => 27, 'locale_id' => 28, 'ip' => 29, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
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
        $this->setName('bookings');
        $this->setPhpName('Bookings');
        $this->setClassName('\\HookCalendar\\Model\\Bookings');
        $this->setPackage('HookCalendar.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('UUID', 'Uuid', 'VARCHAR', false, 12, null);
        $this->addColumn('CALENDAR_ID', 'CalendarId', 'INTEGER', false, 10, null);
        $this->addColumn('BOOKING_PRICE', 'BookingPrice', 'DECIMAL', false, 9, null);
        $this->addColumn('BOOKING_TOTAL', 'BookingTotal', 'DECIMAL', false, 9, null);
        $this->addColumn('BOOKING_DEPOSIT', 'BookingDeposit', 'DECIMAL', false, 9, null);
        $this->addColumn('BOOKING_TAX', 'BookingTax', 'DECIMAL', false, 9, null);
        $this->addColumn('BOOKING_STATUS', 'BookingStatus', 'CHAR', false, null, null);
        $this->addColumn('PAYMENT_METHOD', 'PaymentMethod', 'CHAR', false, null, null);
        $this->addColumn('C_NAME', 'CName', 'VARCHAR', false, 255, null);
        $this->addColumn('C_EMAIL', 'CEmail', 'VARCHAR', false, 255, null);
        $this->addColumn('C_PHONE', 'CPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('C_COUNTRY_ID', 'CCountryId', 'INTEGER', false, 10, null);
        $this->addColumn('C_CITY', 'CCity', 'VARCHAR', false, 255, null);
        $this->addColumn('C_STATE', 'CState', 'VARCHAR', false, 255, null);
        $this->addColumn('C_ZIP', 'CZip', 'VARCHAR', false, 255, null);
        $this->addColumn('C_ADDRESS_1', 'CAddress1', 'VARCHAR', false, 255, null);
        $this->addColumn('C_ADDRESS_2', 'CAddress2', 'VARCHAR', false, 255, null);
        $this->addColumn('C_NOTES', 'CNotes', 'LONGVARCHAR', false, null, null);
        $this->addColumn('CC_TYPE', 'CcType', 'VARCHAR', false, 255, null);
        $this->addColumn('CC_NUM', 'CcNum', 'VARCHAR', false, 255, null);
        $this->addColumn('CC_EXP_YEAR', 'CcExpYear', 'INTEGER', false, 4, null);
        $this->addColumn('CC_EXP_MONTH', 'CcExpMonth', 'VARCHAR', false, 2, null);
        $this->addColumn('CC_CODE', 'CcCode', 'VARCHAR', false, 255, null);
        $this->addColumn('TXN_ID', 'TxnId', 'VARCHAR', false, 255, null);
        $this->addColumn('PROCESSED_ON', 'ProcessedOn', 'TIMESTAMP', false, null, null);
        $this->addColumn('CREATED', 'Created', 'TIMESTAMP', false, null, null);
        $this->addColumn('MODIFIED', 'Modified', 'TIMESTAMP', false, null, null);
        $this->addColumn('LOCALE_ID', 'LocaleId', 'TINYINT', false, 3, null);
        $this->addColumn('IP', 'Ip', 'VARCHAR', false, 15, null);
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
        return $withPrefix ? BookingsTableMap::CLASS_DEFAULT : BookingsTableMap::OM_CLASS;
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
     * @return array (Bookings object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BookingsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookingsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookingsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookingsTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookingsTableMap::addInstanceToPool($obj, $key);
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
            $key = BookingsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookingsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookingsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BookingsTableMap::ID);
            $criteria->addSelectColumn(BookingsTableMap::UUID);
            $criteria->addSelectColumn(BookingsTableMap::CALENDAR_ID);
            $criteria->addSelectColumn(BookingsTableMap::BOOKING_PRICE);
            $criteria->addSelectColumn(BookingsTableMap::BOOKING_TOTAL);
            $criteria->addSelectColumn(BookingsTableMap::BOOKING_DEPOSIT);
            $criteria->addSelectColumn(BookingsTableMap::BOOKING_TAX);
            $criteria->addSelectColumn(BookingsTableMap::BOOKING_STATUS);
            $criteria->addSelectColumn(BookingsTableMap::PAYMENT_METHOD);
            $criteria->addSelectColumn(BookingsTableMap::C_NAME);
            $criteria->addSelectColumn(BookingsTableMap::C_EMAIL);
            $criteria->addSelectColumn(BookingsTableMap::C_PHONE);
            $criteria->addSelectColumn(BookingsTableMap::C_COUNTRY_ID);
            $criteria->addSelectColumn(BookingsTableMap::C_CITY);
            $criteria->addSelectColumn(BookingsTableMap::C_STATE);
            $criteria->addSelectColumn(BookingsTableMap::C_ZIP);
            $criteria->addSelectColumn(BookingsTableMap::C_ADDRESS_1);
            $criteria->addSelectColumn(BookingsTableMap::C_ADDRESS_2);
            $criteria->addSelectColumn(BookingsTableMap::C_NOTES);
            $criteria->addSelectColumn(BookingsTableMap::CC_TYPE);
            $criteria->addSelectColumn(BookingsTableMap::CC_NUM);
            $criteria->addSelectColumn(BookingsTableMap::CC_EXP_YEAR);
            $criteria->addSelectColumn(BookingsTableMap::CC_EXP_MONTH);
            $criteria->addSelectColumn(BookingsTableMap::CC_CODE);
            $criteria->addSelectColumn(BookingsTableMap::TXN_ID);
            $criteria->addSelectColumn(BookingsTableMap::PROCESSED_ON);
            $criteria->addSelectColumn(BookingsTableMap::CREATED);
            $criteria->addSelectColumn(BookingsTableMap::MODIFIED);
            $criteria->addSelectColumn(BookingsTableMap::LOCALE_ID);
            $criteria->addSelectColumn(BookingsTableMap::IP);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.UUID');
            $criteria->addSelectColumn($alias . '.CALENDAR_ID');
            $criteria->addSelectColumn($alias . '.BOOKING_PRICE');
            $criteria->addSelectColumn($alias . '.BOOKING_TOTAL');
            $criteria->addSelectColumn($alias . '.BOOKING_DEPOSIT');
            $criteria->addSelectColumn($alias . '.BOOKING_TAX');
            $criteria->addSelectColumn($alias . '.BOOKING_STATUS');
            $criteria->addSelectColumn($alias . '.PAYMENT_METHOD');
            $criteria->addSelectColumn($alias . '.C_NAME');
            $criteria->addSelectColumn($alias . '.C_EMAIL');
            $criteria->addSelectColumn($alias . '.C_PHONE');
            $criteria->addSelectColumn($alias . '.C_COUNTRY_ID');
            $criteria->addSelectColumn($alias . '.C_CITY');
            $criteria->addSelectColumn($alias . '.C_STATE');
            $criteria->addSelectColumn($alias . '.C_ZIP');
            $criteria->addSelectColumn($alias . '.C_ADDRESS_1');
            $criteria->addSelectColumn($alias . '.C_ADDRESS_2');
            $criteria->addSelectColumn($alias . '.C_NOTES');
            $criteria->addSelectColumn($alias . '.CC_TYPE');
            $criteria->addSelectColumn($alias . '.CC_NUM');
            $criteria->addSelectColumn($alias . '.CC_EXP_YEAR');
            $criteria->addSelectColumn($alias . '.CC_EXP_MONTH');
            $criteria->addSelectColumn($alias . '.CC_CODE');
            $criteria->addSelectColumn($alias . '.TXN_ID');
            $criteria->addSelectColumn($alias . '.PROCESSED_ON');
            $criteria->addSelectColumn($alias . '.CREATED');
            $criteria->addSelectColumn($alias . '.MODIFIED');
            $criteria->addSelectColumn($alias . '.LOCALE_ID');
            $criteria->addSelectColumn($alias . '.IP');
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
        return Propel::getServiceContainer()->getDatabaseMap(BookingsTableMap::DATABASE_NAME)->getTable(BookingsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(BookingsTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(BookingsTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new BookingsTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a Bookings or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Bookings object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \HookCalendar\Model\Bookings) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookingsTableMap::DATABASE_NAME);
            $criteria->add(BookingsTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = BookingsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { BookingsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { BookingsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the bookings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BookingsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Bookings or Criteria object.
     *
     * @param mixed               $criteria Criteria or Bookings object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Bookings object
        }

        if ($criteria->containsKey(BookingsTableMap::ID) && $criteria->keyContainsValue(BookingsTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BookingsTableMap::ID.')');
        }


        // Set the correct dbName
        $query = BookingsQuery::create()->mergeWith($criteria);

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

} // BookingsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BookingsTableMap::buildTableMap();
