<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\Employees as ChildEmployees;
use HookCalendar\Model\EmployeesQuery as ChildEmployeesQuery;
use HookCalendar\Model\Map\EmployeesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'employees' table.
 *
 *
 *
 * @method     ChildEmployeesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildEmployeesQuery orderByCalendarId($order = Criteria::ASC) Order by the calendar_id column
 * @method     ChildEmployeesQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildEmployeesQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildEmployeesQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildEmployeesQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildEmployeesQuery orderByAvatar($order = Criteria::ASC) Order by the avatar column
 * @method     ChildEmployeesQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method     ChildEmployeesQuery orderByIsSubscribed($order = Criteria::ASC) Order by the is_subscribed column
 * @method     ChildEmployeesQuery orderByIsSubscribedSms($order = Criteria::ASC) Order by the is_subscribed_sms column
 * @method     ChildEmployeesQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method     ChildEmployeesQuery groupById() Group by the id column
 * @method     ChildEmployeesQuery groupByCalendarId() Group by the calendar_id column
 * @method     ChildEmployeesQuery groupByEmail() Group by the email column
 * @method     ChildEmployeesQuery groupByPassword() Group by the password column
 * @method     ChildEmployeesQuery groupByPhone() Group by the phone column
 * @method     ChildEmployeesQuery groupByNotes() Group by the notes column
 * @method     ChildEmployeesQuery groupByAvatar() Group by the avatar column
 * @method     ChildEmployeesQuery groupByLastLogin() Group by the last_login column
 * @method     ChildEmployeesQuery groupByIsSubscribed() Group by the is_subscribed column
 * @method     ChildEmployeesQuery groupByIsSubscribedSms() Group by the is_subscribed_sms column
 * @method     ChildEmployeesQuery groupByIsActive() Group by the is_active column
 *
 * @method     ChildEmployeesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEmployeesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEmployeesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEmployees findOne(ConnectionInterface $con = null) Return the first ChildEmployees matching the query
 * @method     ChildEmployees findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEmployees matching the query, or a new ChildEmployees object populated from the query conditions when no match is found
 *
 * @method     ChildEmployees findOneById(int $id) Return the first ChildEmployees filtered by the id column
 * @method     ChildEmployees findOneByCalendarId(int $calendar_id) Return the first ChildEmployees filtered by the calendar_id column
 * @method     ChildEmployees findOneByEmail(string $email) Return the first ChildEmployees filtered by the email column
 * @method     ChildEmployees findOneByPassword(resource $password) Return the first ChildEmployees filtered by the password column
 * @method     ChildEmployees findOneByPhone(string $phone) Return the first ChildEmployees filtered by the phone column
 * @method     ChildEmployees findOneByNotes(string $notes) Return the first ChildEmployees filtered by the notes column
 * @method     ChildEmployees findOneByAvatar(string $avatar) Return the first ChildEmployees filtered by the avatar column
 * @method     ChildEmployees findOneByLastLogin(string $last_login) Return the first ChildEmployees filtered by the last_login column
 * @method     ChildEmployees findOneByIsSubscribed(boolean $is_subscribed) Return the first ChildEmployees filtered by the is_subscribed column
 * @method     ChildEmployees findOneByIsSubscribedSms(boolean $is_subscribed_sms) Return the first ChildEmployees filtered by the is_subscribed_sms column
 * @method     ChildEmployees findOneByIsActive(boolean $is_active) Return the first ChildEmployees filtered by the is_active column
 *
 * @method     array findById(int $id) Return ChildEmployees objects filtered by the id column
 * @method     array findByCalendarId(int $calendar_id) Return ChildEmployees objects filtered by the calendar_id column
 * @method     array findByEmail(string $email) Return ChildEmployees objects filtered by the email column
 * @method     array findByPassword(resource $password) Return ChildEmployees objects filtered by the password column
 * @method     array findByPhone(string $phone) Return ChildEmployees objects filtered by the phone column
 * @method     array findByNotes(string $notes) Return ChildEmployees objects filtered by the notes column
 * @method     array findByAvatar(string $avatar) Return ChildEmployees objects filtered by the avatar column
 * @method     array findByLastLogin(string $last_login) Return ChildEmployees objects filtered by the last_login column
 * @method     array findByIsSubscribed(boolean $is_subscribed) Return ChildEmployees objects filtered by the is_subscribed column
 * @method     array findByIsSubscribedSms(boolean $is_subscribed_sms) Return ChildEmployees objects filtered by the is_subscribed_sms column
 * @method     array findByIsActive(boolean $is_active) Return ChildEmployees objects filtered by the is_active column
 *
 */
abstract class EmployeesQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\EmployeesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\Employees', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEmployeesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEmployeesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\EmployeesQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\EmployeesQuery();
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
     * @return ChildEmployees|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EmployeesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EmployeesTableMap::DATABASE_NAME);
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
     * @return   ChildEmployees A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, CALENDAR_ID, EMAIL, PASSWORD, PHONE, NOTES, AVATAR, LAST_LOGIN, IS_SUBSCRIBED, IS_SUBSCRIBED_SMS, IS_ACTIVE FROM employees WHERE ID = :p0';
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
            $obj = new ChildEmployees();
            $obj->hydrate($row);
            EmployeesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildEmployees|array|mixed the result, formatted by the current formatter
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
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmployeesTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmployeesTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EmployeesTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EmployeesTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::ID, $id, $comparison);
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
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByCalendarId($calendarId = null, $comparison = null)
    {
        if (is_array($calendarId)) {
            $useMinMax = false;
            if (isset($calendarId['min'])) {
                $this->addUsingAlias(EmployeesTableMap::CALENDAR_ID, $calendarId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($calendarId['max'])) {
                $this->addUsingAlias(EmployeesTableMap::CALENDAR_ID, $calendarId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::CALENDAR_ID, $calendarId, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * @param     mixed $password The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {

        return $this->addUsingAlias(EmployeesTableMap::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the avatar column
     *
     * Example usage:
     * <code>
     * $query->filterByAvatar('fooValue');   // WHERE avatar = 'fooValue'
     * $query->filterByAvatar('%fooValue%'); // WHERE avatar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $avatar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByAvatar($avatar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($avatar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $avatar)) {
                $avatar = str_replace('*', '%', $avatar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::AVATAR, $avatar, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(EmployeesTableMap::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(EmployeesTableMap::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeesTableMap::LAST_LOGIN, $lastLogin, $comparison);
    }

    /**
     * Filter the query on the is_subscribed column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSubscribed(true); // WHERE is_subscribed = true
     * $query->filterByIsSubscribed('yes'); // WHERE is_subscribed = true
     * </code>
     *
     * @param     boolean|string $isSubscribed The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByIsSubscribed($isSubscribed = null, $comparison = null)
    {
        if (is_string($isSubscribed)) {
            $is_subscribed = in_array(strtolower($isSubscribed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmployeesTableMap::IS_SUBSCRIBED, $isSubscribed, $comparison);
    }

    /**
     * Filter the query on the is_subscribed_sms column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSubscribedSms(true); // WHERE is_subscribed_sms = true
     * $query->filterByIsSubscribedSms('yes'); // WHERE is_subscribed_sms = true
     * </code>
     *
     * @param     boolean|string $isSubscribedSms The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByIsSubscribedSms($isSubscribedSms = null, $comparison = null)
    {
        if (is_string($isSubscribedSms)) {
            $is_subscribed_sms = in_array(strtolower($isSubscribedSms), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmployeesTableMap::IS_SUBSCRIBED_SMS, $isSubscribedSms, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $is_active = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmployeesTableMap::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEmployees $employees Object to remove from the list of results
     *
     * @return ChildEmployeesQuery The current query, for fluid interface
     */
    public function prune($employees = null)
    {
        if ($employees) {
            $this->addUsingAlias(EmployeesTableMap::ID, $employees->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the employees table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
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
            EmployeesTableMap::clearInstancePool();
            EmployeesTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildEmployees or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildEmployees object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EmployeesTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        EmployeesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EmployeesTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // EmployeesQuery
