<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\Bookings as ChildBookings;
use HookCalendar\Model\BookingsQuery as ChildBookingsQuery;
use HookCalendar\Model\Map\BookingsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bookings' table.
 *
 *
 *
 * @method     ChildBookingsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildBookingsQuery orderByUuid($order = Criteria::ASC) Order by the uuid column
 * @method     ChildBookingsQuery orderByCalendarId($order = Criteria::ASC) Order by the calendar_id column
 * @method     ChildBookingsQuery orderByBookingPrice($order = Criteria::ASC) Order by the booking_price column
 * @method     ChildBookingsQuery orderByBookingTotal($order = Criteria::ASC) Order by the booking_total column
 * @method     ChildBookingsQuery orderByBookingDeposit($order = Criteria::ASC) Order by the booking_deposit column
 * @method     ChildBookingsQuery orderByBookingTax($order = Criteria::ASC) Order by the booking_tax column
 * @method     ChildBookingsQuery orderByBookingStatus($order = Criteria::ASC) Order by the booking_status column
 * @method     ChildBookingsQuery orderByPaymentMethod($order = Criteria::ASC) Order by the payment_method column
 * @method     ChildBookingsQuery orderByCName($order = Criteria::ASC) Order by the c_name column
 * @method     ChildBookingsQuery orderByCEmail($order = Criteria::ASC) Order by the c_email column
 * @method     ChildBookingsQuery orderByCPhone($order = Criteria::ASC) Order by the c_phone column
 * @method     ChildBookingsQuery orderByCCountryId($order = Criteria::ASC) Order by the c_country_id column
 * @method     ChildBookingsQuery orderByCCity($order = Criteria::ASC) Order by the c_city column
 * @method     ChildBookingsQuery orderByCState($order = Criteria::ASC) Order by the c_state column
 * @method     ChildBookingsQuery orderByCZip($order = Criteria::ASC) Order by the c_zip column
 * @method     ChildBookingsQuery orderByCAddress1($order = Criteria::ASC) Order by the c_address_1 column
 * @method     ChildBookingsQuery orderByCAddress2($order = Criteria::ASC) Order by the c_address_2 column
 * @method     ChildBookingsQuery orderByCNotes($order = Criteria::ASC) Order by the c_notes column
 * @method     ChildBookingsQuery orderByCcType($order = Criteria::ASC) Order by the cc_type column
 * @method     ChildBookingsQuery orderByCcNum($order = Criteria::ASC) Order by the cc_num column
 * @method     ChildBookingsQuery orderByCcExpYear($order = Criteria::ASC) Order by the cc_exp_year column
 * @method     ChildBookingsQuery orderByCcExpMonth($order = Criteria::ASC) Order by the cc_exp_month column
 * @method     ChildBookingsQuery orderByCcCode($order = Criteria::ASC) Order by the cc_code column
 * @method     ChildBookingsQuery orderByTxnId($order = Criteria::ASC) Order by the txn_id column
 * @method     ChildBookingsQuery orderByProcessedOn($order = Criteria::ASC) Order by the processed_on column
 * @method     ChildBookingsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     ChildBookingsQuery orderByModified($order = Criteria::ASC) Order by the modified column
 * @method     ChildBookingsQuery orderByLocaleId($order = Criteria::ASC) Order by the locale_id column
 * @method     ChildBookingsQuery orderByIp($order = Criteria::ASC) Order by the ip column
 *
 * @method     ChildBookingsQuery groupById() Group by the id column
 * @method     ChildBookingsQuery groupByUuid() Group by the uuid column
 * @method     ChildBookingsQuery groupByCalendarId() Group by the calendar_id column
 * @method     ChildBookingsQuery groupByBookingPrice() Group by the booking_price column
 * @method     ChildBookingsQuery groupByBookingTotal() Group by the booking_total column
 * @method     ChildBookingsQuery groupByBookingDeposit() Group by the booking_deposit column
 * @method     ChildBookingsQuery groupByBookingTax() Group by the booking_tax column
 * @method     ChildBookingsQuery groupByBookingStatus() Group by the booking_status column
 * @method     ChildBookingsQuery groupByPaymentMethod() Group by the payment_method column
 * @method     ChildBookingsQuery groupByCName() Group by the c_name column
 * @method     ChildBookingsQuery groupByCEmail() Group by the c_email column
 * @method     ChildBookingsQuery groupByCPhone() Group by the c_phone column
 * @method     ChildBookingsQuery groupByCCountryId() Group by the c_country_id column
 * @method     ChildBookingsQuery groupByCCity() Group by the c_city column
 * @method     ChildBookingsQuery groupByCState() Group by the c_state column
 * @method     ChildBookingsQuery groupByCZip() Group by the c_zip column
 * @method     ChildBookingsQuery groupByCAddress1() Group by the c_address_1 column
 * @method     ChildBookingsQuery groupByCAddress2() Group by the c_address_2 column
 * @method     ChildBookingsQuery groupByCNotes() Group by the c_notes column
 * @method     ChildBookingsQuery groupByCcType() Group by the cc_type column
 * @method     ChildBookingsQuery groupByCcNum() Group by the cc_num column
 * @method     ChildBookingsQuery groupByCcExpYear() Group by the cc_exp_year column
 * @method     ChildBookingsQuery groupByCcExpMonth() Group by the cc_exp_month column
 * @method     ChildBookingsQuery groupByCcCode() Group by the cc_code column
 * @method     ChildBookingsQuery groupByTxnId() Group by the txn_id column
 * @method     ChildBookingsQuery groupByProcessedOn() Group by the processed_on column
 * @method     ChildBookingsQuery groupByCreated() Group by the created column
 * @method     ChildBookingsQuery groupByModified() Group by the modified column
 * @method     ChildBookingsQuery groupByLocaleId() Group by the locale_id column
 * @method     ChildBookingsQuery groupByIp() Group by the ip column
 *
 * @method     ChildBookingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookings findOne(ConnectionInterface $con = null) Return the first ChildBookings matching the query
 * @method     ChildBookings findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBookings matching the query, or a new ChildBookings object populated from the query conditions when no match is found
 *
 * @method     ChildBookings findOneById(int $id) Return the first ChildBookings filtered by the id column
 * @method     ChildBookings findOneByUuid(string $uuid) Return the first ChildBookings filtered by the uuid column
 * @method     ChildBookings findOneByCalendarId(int $calendar_id) Return the first ChildBookings filtered by the calendar_id column
 * @method     ChildBookings findOneByBookingPrice(string $booking_price) Return the first ChildBookings filtered by the booking_price column
 * @method     ChildBookings findOneByBookingTotal(string $booking_total) Return the first ChildBookings filtered by the booking_total column
 * @method     ChildBookings findOneByBookingDeposit(string $booking_deposit) Return the first ChildBookings filtered by the booking_deposit column
 * @method     ChildBookings findOneByBookingTax(string $booking_tax) Return the first ChildBookings filtered by the booking_tax column
 * @method     ChildBookings findOneByBookingStatus(string $booking_status) Return the first ChildBookings filtered by the booking_status column
 * @method     ChildBookings findOneByPaymentMethod(string $payment_method) Return the first ChildBookings filtered by the payment_method column
 * @method     ChildBookings findOneByCName(string $c_name) Return the first ChildBookings filtered by the c_name column
 * @method     ChildBookings findOneByCEmail(string $c_email) Return the first ChildBookings filtered by the c_email column
 * @method     ChildBookings findOneByCPhone(string $c_phone) Return the first ChildBookings filtered by the c_phone column
 * @method     ChildBookings findOneByCCountryId(int $c_country_id) Return the first ChildBookings filtered by the c_country_id column
 * @method     ChildBookings findOneByCCity(string $c_city) Return the first ChildBookings filtered by the c_city column
 * @method     ChildBookings findOneByCState(string $c_state) Return the first ChildBookings filtered by the c_state column
 * @method     ChildBookings findOneByCZip(string $c_zip) Return the first ChildBookings filtered by the c_zip column
 * @method     ChildBookings findOneByCAddress1(string $c_address_1) Return the first ChildBookings filtered by the c_address_1 column
 * @method     ChildBookings findOneByCAddress2(string $c_address_2) Return the first ChildBookings filtered by the c_address_2 column
 * @method     ChildBookings findOneByCNotes(string $c_notes) Return the first ChildBookings filtered by the c_notes column
 * @method     ChildBookings findOneByCcType(string $cc_type) Return the first ChildBookings filtered by the cc_type column
 * @method     ChildBookings findOneByCcNum(string $cc_num) Return the first ChildBookings filtered by the cc_num column
 * @method     ChildBookings findOneByCcExpYear(int $cc_exp_year) Return the first ChildBookings filtered by the cc_exp_year column
 * @method     ChildBookings findOneByCcExpMonth(string $cc_exp_month) Return the first ChildBookings filtered by the cc_exp_month column
 * @method     ChildBookings findOneByCcCode(string $cc_code) Return the first ChildBookings filtered by the cc_code column
 * @method     ChildBookings findOneByTxnId(string $txn_id) Return the first ChildBookings filtered by the txn_id column
 * @method     ChildBookings findOneByProcessedOn(string $processed_on) Return the first ChildBookings filtered by the processed_on column
 * @method     ChildBookings findOneByCreated(string $created) Return the first ChildBookings filtered by the created column
 * @method     ChildBookings findOneByModified(string $modified) Return the first ChildBookings filtered by the modified column
 * @method     ChildBookings findOneByLocaleId(int $locale_id) Return the first ChildBookings filtered by the locale_id column
 * @method     ChildBookings findOneByIp(string $ip) Return the first ChildBookings filtered by the ip column
 *
 * @method     array findById(int $id) Return ChildBookings objects filtered by the id column
 * @method     array findByUuid(string $uuid) Return ChildBookings objects filtered by the uuid column
 * @method     array findByCalendarId(int $calendar_id) Return ChildBookings objects filtered by the calendar_id column
 * @method     array findByBookingPrice(string $booking_price) Return ChildBookings objects filtered by the booking_price column
 * @method     array findByBookingTotal(string $booking_total) Return ChildBookings objects filtered by the booking_total column
 * @method     array findByBookingDeposit(string $booking_deposit) Return ChildBookings objects filtered by the booking_deposit column
 * @method     array findByBookingTax(string $booking_tax) Return ChildBookings objects filtered by the booking_tax column
 * @method     array findByBookingStatus(string $booking_status) Return ChildBookings objects filtered by the booking_status column
 * @method     array findByPaymentMethod(string $payment_method) Return ChildBookings objects filtered by the payment_method column
 * @method     array findByCName(string $c_name) Return ChildBookings objects filtered by the c_name column
 * @method     array findByCEmail(string $c_email) Return ChildBookings objects filtered by the c_email column
 * @method     array findByCPhone(string $c_phone) Return ChildBookings objects filtered by the c_phone column
 * @method     array findByCCountryId(int $c_country_id) Return ChildBookings objects filtered by the c_country_id column
 * @method     array findByCCity(string $c_city) Return ChildBookings objects filtered by the c_city column
 * @method     array findByCState(string $c_state) Return ChildBookings objects filtered by the c_state column
 * @method     array findByCZip(string $c_zip) Return ChildBookings objects filtered by the c_zip column
 * @method     array findByCAddress1(string $c_address_1) Return ChildBookings objects filtered by the c_address_1 column
 * @method     array findByCAddress2(string $c_address_2) Return ChildBookings objects filtered by the c_address_2 column
 * @method     array findByCNotes(string $c_notes) Return ChildBookings objects filtered by the c_notes column
 * @method     array findByCcType(string $cc_type) Return ChildBookings objects filtered by the cc_type column
 * @method     array findByCcNum(string $cc_num) Return ChildBookings objects filtered by the cc_num column
 * @method     array findByCcExpYear(int $cc_exp_year) Return ChildBookings objects filtered by the cc_exp_year column
 * @method     array findByCcExpMonth(string $cc_exp_month) Return ChildBookings objects filtered by the cc_exp_month column
 * @method     array findByCcCode(string $cc_code) Return ChildBookings objects filtered by the cc_code column
 * @method     array findByTxnId(string $txn_id) Return ChildBookings objects filtered by the txn_id column
 * @method     array findByProcessedOn(string $processed_on) Return ChildBookings objects filtered by the processed_on column
 * @method     array findByCreated(string $created) Return ChildBookings objects filtered by the created column
 * @method     array findByModified(string $modified) Return ChildBookings objects filtered by the modified column
 * @method     array findByLocaleId(int $locale_id) Return ChildBookings objects filtered by the locale_id column
 * @method     array findByIp(string $ip) Return ChildBookings objects filtered by the ip column
 *
 */
abstract class BookingsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\BookingsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\Bookings', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\BookingsQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\BookingsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBookings|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BookingsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildBookings A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, UUID, CALENDAR_ID, BOOKING_PRICE, BOOKING_TOTAL, BOOKING_DEPOSIT, BOOKING_TAX, BOOKING_STATUS, PAYMENT_METHOD, C_NAME, C_EMAIL, C_PHONE, C_COUNTRY_ID, C_CITY, C_STATE, C_ZIP, C_ADDRESS_1, C_ADDRESS_2, C_NOTES, CC_TYPE, CC_NUM, CC_EXP_YEAR, CC_EXP_MONTH, CC_CODE, TXN_ID, PROCESSED_ON, CREATED, MODIFIED, LOCALE_ID, IP FROM bookings WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildBookings();
            $obj->hydrate($row);
            BookingsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildBookings|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookingsTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookingsTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BookingsTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BookingsTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the uuid column
     *
     * Example usage:
     * <code>
     * $query->filterByUuid('fooValue');   // WHERE uuid = 'fooValue'
     * $query->filterByUuid('%fooValue%'); // WHERE uuid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uuid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByUuid($uuid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uuid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $uuid)) {
                $uuid = str_replace('*', '%', $uuid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::UUID, $uuid, $comparison);
    }

    /**
     * Filter the query on the calendar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCalendarId(1234); // WHERE calendar_id = 1234
     * $query->filterByCalendarId(array(12, 34)); // WHERE calendar_id IN (12, 34)
     * $query->filterByCalendarId(array('min' => 12)); // WHERE calendar_id > 12
     * </code>
     *
     * @param     mixed $calendarId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCalendarId($calendarId = null, $comparison = null)
    {
        if (is_array($calendarId)) {
            $useMinMax = false;
            if (isset($calendarId['min'])) {
                $this->addUsingAlias(BookingsTableMap::CALENDAR_ID, $calendarId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calendarId['max'])) {
                $this->addUsingAlias(BookingsTableMap::CALENDAR_ID, $calendarId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CALENDAR_ID, $calendarId, $comparison);
    }

    /**
     * Filter the query on the booking_price column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingPrice(1234); // WHERE booking_price = 1234
     * $query->filterByBookingPrice(array(12, 34)); // WHERE booking_price IN (12, 34)
     * $query->filterByBookingPrice(array('min' => 12)); // WHERE booking_price > 12
     * </code>
     *
     * @param     mixed $bookingPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByBookingPrice($bookingPrice = null, $comparison = null)
    {
        if (is_array($bookingPrice)) {
            $useMinMax = false;
            if (isset($bookingPrice['min'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_PRICE, $bookingPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingPrice['max'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_PRICE, $bookingPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::BOOKING_PRICE, $bookingPrice, $comparison);
    }

    /**
     * Filter the query on the booking_total column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingTotal(1234); // WHERE booking_total = 1234
     * $query->filterByBookingTotal(array(12, 34)); // WHERE booking_total IN (12, 34)
     * $query->filterByBookingTotal(array('min' => 12)); // WHERE booking_total > 12
     * </code>
     *
     * @param     mixed $bookingTotal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByBookingTotal($bookingTotal = null, $comparison = null)
    {
        if (is_array($bookingTotal)) {
            $useMinMax = false;
            if (isset($bookingTotal['min'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_TOTAL, $bookingTotal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingTotal['max'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_TOTAL, $bookingTotal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::BOOKING_TOTAL, $bookingTotal, $comparison);
    }

    /**
     * Filter the query on the booking_deposit column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingDeposit(1234); // WHERE booking_deposit = 1234
     * $query->filterByBookingDeposit(array(12, 34)); // WHERE booking_deposit IN (12, 34)
     * $query->filterByBookingDeposit(array('min' => 12)); // WHERE booking_deposit > 12
     * </code>
     *
     * @param     mixed $bookingDeposit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByBookingDeposit($bookingDeposit = null, $comparison = null)
    {
        if (is_array($bookingDeposit)) {
            $useMinMax = false;
            if (isset($bookingDeposit['min'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_DEPOSIT, $bookingDeposit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingDeposit['max'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_DEPOSIT, $bookingDeposit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::BOOKING_DEPOSIT, $bookingDeposit, $comparison);
    }

    /**
     * Filter the query on the booking_tax column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingTax(1234); // WHERE booking_tax = 1234
     * $query->filterByBookingTax(array(12, 34)); // WHERE booking_tax IN (12, 34)
     * $query->filterByBookingTax(array('min' => 12)); // WHERE booking_tax > 12
     * </code>
     *
     * @param     mixed $bookingTax The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByBookingTax($bookingTax = null, $comparison = null)
    {
        if (is_array($bookingTax)) {
            $useMinMax = false;
            if (isset($bookingTax['min'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_TAX, $bookingTax['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookingTax['max'])) {
                $this->addUsingAlias(BookingsTableMap::BOOKING_TAX, $bookingTax['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::BOOKING_TAX, $bookingTax, $comparison);
    }

    /**
     * Filter the query on the booking_status column
     *
     * Example usage:
     * <code>
     * $query->filterByBookingStatus('fooValue');   // WHERE booking_status = 'fooValue'
     * $query->filterByBookingStatus('%fooValue%'); // WHERE booking_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bookingStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByBookingStatus($bookingStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bookingStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bookingStatus)) {
                $bookingStatus = str_replace('*', '%', $bookingStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::BOOKING_STATUS, $bookingStatus, $comparison);
    }

    /**
     * Filter the query on the payment_method column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentMethod('fooValue');   // WHERE payment_method = 'fooValue'
     * $query->filterByPaymentMethod('%fooValue%'); // WHERE payment_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentMethod The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByPaymentMethod($paymentMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentMethod)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $paymentMethod)) {
                $paymentMethod = str_replace('*', '%', $paymentMethod);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::PAYMENT_METHOD, $paymentMethod, $comparison);
    }

    /**
     * Filter the query on the c_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCName('fooValue');   // WHERE c_name = 'fooValue'
     * $query->filterByCName('%fooValue%'); // WHERE c_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCName($cName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cName)) {
                $cName = str_replace('*', '%', $cName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_NAME, $cName, $comparison);
    }

    /**
     * Filter the query on the c_email column
     *
     * Example usage:
     * <code>
     * $query->filterByCEmail('fooValue');   // WHERE c_email = 'fooValue'
     * $query->filterByCEmail('%fooValue%'); // WHERE c_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cEmail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCEmail($cEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cEmail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cEmail)) {
                $cEmail = str_replace('*', '%', $cEmail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_EMAIL, $cEmail, $comparison);
    }

    /**
     * Filter the query on the c_phone column
     *
     * Example usage:
     * <code>
     * $query->filterByCPhone('fooValue');   // WHERE c_phone = 'fooValue'
     * $query->filterByCPhone('%fooValue%'); // WHERE c_phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cPhone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCPhone($cPhone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cPhone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cPhone)) {
                $cPhone = str_replace('*', '%', $cPhone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_PHONE, $cPhone, $comparison);
    }

    /**
     * Filter the query on the c_country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCCountryId(1234); // WHERE c_country_id = 1234
     * $query->filterByCCountryId(array(12, 34)); // WHERE c_country_id IN (12, 34)
     * $query->filterByCCountryId(array('min' => 12)); // WHERE c_country_id > 12
     * </code>
     *
     * @param     mixed $cCountryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCCountryId($cCountryId = null, $comparison = null)
    {
        if (is_array($cCountryId)) {
            $useMinMax = false;
            if (isset($cCountryId['min'])) {
                $this->addUsingAlias(BookingsTableMap::C_COUNTRY_ID, $cCountryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cCountryId['max'])) {
                $this->addUsingAlias(BookingsTableMap::C_COUNTRY_ID, $cCountryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_COUNTRY_ID, $cCountryId, $comparison);
    }

    /**
     * Filter the query on the c_city column
     *
     * Example usage:
     * <code>
     * $query->filterByCCity('fooValue');   // WHERE c_city = 'fooValue'
     * $query->filterByCCity('%fooValue%'); // WHERE c_city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cCity The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCCity($cCity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cCity)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cCity)) {
                $cCity = str_replace('*', '%', $cCity);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_CITY, $cCity, $comparison);
    }

    /**
     * Filter the query on the c_state column
     *
     * Example usage:
     * <code>
     * $query->filterByCState('fooValue');   // WHERE c_state = 'fooValue'
     * $query->filterByCState('%fooValue%'); // WHERE c_state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cState The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCState($cState = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cState)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cState)) {
                $cState = str_replace('*', '%', $cState);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_STATE, $cState, $comparison);
    }

    /**
     * Filter the query on the c_zip column
     *
     * Example usage:
     * <code>
     * $query->filterByCZip('fooValue');   // WHERE c_zip = 'fooValue'
     * $query->filterByCZip('%fooValue%'); // WHERE c_zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cZip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCZip($cZip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cZip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cZip)) {
                $cZip = str_replace('*', '%', $cZip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_ZIP, $cZip, $comparison);
    }

    /**
     * Filter the query on the c_address_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByCAddress1('fooValue');   // WHERE c_address_1 = 'fooValue'
     * $query->filterByCAddress1('%fooValue%'); // WHERE c_address_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cAddress1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCAddress1($cAddress1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cAddress1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cAddress1)) {
                $cAddress1 = str_replace('*', '%', $cAddress1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_ADDRESS_1, $cAddress1, $comparison);
    }

    /**
     * Filter the query on the c_address_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByCAddress2('fooValue');   // WHERE c_address_2 = 'fooValue'
     * $query->filterByCAddress2('%fooValue%'); // WHERE c_address_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cAddress2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCAddress2($cAddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cAddress2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cAddress2)) {
                $cAddress2 = str_replace('*', '%', $cAddress2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_ADDRESS_2, $cAddress2, $comparison);
    }

    /**
     * Filter the query on the c_notes column
     *
     * Example usage:
     * <code>
     * $query->filterByCNotes('fooValue');   // WHERE c_notes = 'fooValue'
     * $query->filterByCNotes('%fooValue%'); // WHERE c_notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cNotes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCNotes($cNotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cNotes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cNotes)) {
                $cNotes = str_replace('*', '%', $cNotes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::C_NOTES, $cNotes, $comparison);
    }

    /**
     * Filter the query on the cc_type column
     *
     * Example usage:
     * <code>
     * $query->filterByCcType('fooValue');   // WHERE cc_type = 'fooValue'
     * $query->filterByCcType('%fooValue%'); // WHERE cc_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCcType($ccType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ccType)) {
                $ccType = str_replace('*', '%', $ccType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CC_TYPE, $ccType, $comparison);
    }

    /**
     * Filter the query on the cc_num column
     *
     * Example usage:
     * <code>
     * $query->filterByCcNum('fooValue');   // WHERE cc_num = 'fooValue'
     * $query->filterByCcNum('%fooValue%'); // WHERE cc_num LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccNum The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCcNum($ccNum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccNum)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ccNum)) {
                $ccNum = str_replace('*', '%', $ccNum);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CC_NUM, $ccNum, $comparison);
    }

    /**
     * Filter the query on the cc_exp_year column
     *
     * Example usage:
     * <code>
     * $query->filterByCcExpYear(1234); // WHERE cc_exp_year = 1234
     * $query->filterByCcExpYear(array(12, 34)); // WHERE cc_exp_year IN (12, 34)
     * $query->filterByCcExpYear(array('min' => 12)); // WHERE cc_exp_year > 12
     * </code>
     *
     * @param     mixed $ccExpYear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCcExpYear($ccExpYear = null, $comparison = null)
    {
        if (is_array($ccExpYear)) {
            $useMinMax = false;
            if (isset($ccExpYear['min'])) {
                $this->addUsingAlias(BookingsTableMap::CC_EXP_YEAR, $ccExpYear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ccExpYear['max'])) {
                $this->addUsingAlias(BookingsTableMap::CC_EXP_YEAR, $ccExpYear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CC_EXP_YEAR, $ccExpYear, $comparison);
    }

    /**
     * Filter the query on the cc_exp_month column
     *
     * Example usage:
     * <code>
     * $query->filterByCcExpMonth('fooValue');   // WHERE cc_exp_month = 'fooValue'
     * $query->filterByCcExpMonth('%fooValue%'); // WHERE cc_exp_month LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccExpMonth The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCcExpMonth($ccExpMonth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccExpMonth)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ccExpMonth)) {
                $ccExpMonth = str_replace('*', '%', $ccExpMonth);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CC_EXP_MONTH, $ccExpMonth, $comparison);
    }

    /**
     * Filter the query on the cc_code column
     *
     * Example usage:
     * <code>
     * $query->filterByCcCode('fooValue');   // WHERE cc_code = 'fooValue'
     * $query->filterByCcCode('%fooValue%'); // WHERE cc_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCcCode($ccCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ccCode)) {
                $ccCode = str_replace('*', '%', $ccCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CC_CODE, $ccCode, $comparison);
    }

    /**
     * Filter the query on the txn_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTxnId('fooValue');   // WHERE txn_id = 'fooValue'
     * $query->filterByTxnId('%fooValue%'); // WHERE txn_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $txnId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByTxnId($txnId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($txnId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $txnId)) {
                $txnId = str_replace('*', '%', $txnId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::TXN_ID, $txnId, $comparison);
    }

    /**
     * Filter the query on the processed_on column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessedOn('2011-03-14'); // WHERE processed_on = '2011-03-14'
     * $query->filterByProcessedOn('now'); // WHERE processed_on = '2011-03-14'
     * $query->filterByProcessedOn(array('max' => 'yesterday')); // WHERE processed_on > '2011-03-13'
     * </code>
     *
     * @param     mixed $processedOn The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByProcessedOn($processedOn = null, $comparison = null)
    {
        if (is_array($processedOn)) {
            $useMinMax = false;
            if (isset($processedOn['min'])) {
                $this->addUsingAlias(BookingsTableMap::PROCESSED_ON, $processedOn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($processedOn['max'])) {
                $this->addUsingAlias(BookingsTableMap::PROCESSED_ON, $processedOn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::PROCESSED_ON, $processedOn, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(BookingsTableMap::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(BookingsTableMap::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::CREATED, $created, $comparison);
    }

    /**
     * Filter the query on the modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified('2011-03-14'); // WHERE modified = '2011-03-14'
     * $query->filterByModified('now'); // WHERE modified = '2011-03-14'
     * $query->filterByModified(array('max' => 'yesterday')); // WHERE modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $modified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(BookingsTableMap::MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(BookingsTableMap::MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query on the locale_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLocaleId(1234); // WHERE locale_id = 1234
     * $query->filterByLocaleId(array(12, 34)); // WHERE locale_id IN (12, 34)
     * $query->filterByLocaleId(array('min' => 12)); // WHERE locale_id > 12
     * </code>
     *
     * @param     mixed $localeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByLocaleId($localeId = null, $comparison = null)
    {
        if (is_array($localeId)) {
            $useMinMax = false;
            if (isset($localeId['min'])) {
                $this->addUsingAlias(BookingsTableMap::LOCALE_ID, $localeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($localeId['max'])) {
                $this->addUsingAlias(BookingsTableMap::LOCALE_ID, $localeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::LOCALE_ID, $localeId, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%'); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ip)) {
                $ip = str_replace('*', '%', $ip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookingsTableMap::IP, $ip, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBookings $bookings Object to remove from the list of results
     *
     * @return ChildBookingsQuery The current query, for fluid interface
     */
    public function prune($bookings = null)
    {
        if ($bookings) {
            $this->addUsingAlias(BookingsTableMap::ID, $bookings->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bookings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookingsTableMap::clearInstancePool();
            BookingsTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildBookings or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildBookings object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingsTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        BookingsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingsTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // BookingsQuery
