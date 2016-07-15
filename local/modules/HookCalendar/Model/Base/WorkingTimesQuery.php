<?php

namespace HookCalendar\Model\Base;

use \Exception;
use \PDO;
use HookCalendar\Model\WorkingTimes as ChildWorkingTimes;
use HookCalendar\Model\WorkingTimesQuery as ChildWorkingTimesQuery;
use HookCalendar\Model\Map\WorkingTimesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'working_times' table.
 *
 *
 *
 * @method     ChildWorkingTimesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildWorkingTimesQuery orderByForeignId($order = Criteria::ASC) Order by the foreign_id column
 * @method     ChildWorkingTimesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildWorkingTimesQuery orderByMondayFrom($order = Criteria::ASC) Order by the monday_from column
 * @method     ChildWorkingTimesQuery orderByMondayTo($order = Criteria::ASC) Order by the monday_to column
 * @method     ChildWorkingTimesQuery orderByMondayLunchFrom($order = Criteria::ASC) Order by the monday_lunch_from column
 * @method     ChildWorkingTimesQuery orderByMondayLunchTo($order = Criteria::ASC) Order by the monday_lunch_to column
 * @method     ChildWorkingTimesQuery orderByMondayDayoff($order = Criteria::ASC) Order by the monday_dayoff column
 * @method     ChildWorkingTimesQuery orderByTuesdayFrom($order = Criteria::ASC) Order by the tuesday_from column
 * @method     ChildWorkingTimesQuery orderByTuesdayTo($order = Criteria::ASC) Order by the tuesday_to column
 * @method     ChildWorkingTimesQuery orderByTuesdayLunchFrom($order = Criteria::ASC) Order by the tuesday_lunch_from column
 * @method     ChildWorkingTimesQuery orderByTuesdayLunchTo($order = Criteria::ASC) Order by the tuesday_lunch_to column
 * @method     ChildWorkingTimesQuery orderByTuesdayDayoff($order = Criteria::ASC) Order by the tuesday_dayoff column
 * @method     ChildWorkingTimesQuery orderByWednesdayFrom($order = Criteria::ASC) Order by the wednesday_from column
 * @method     ChildWorkingTimesQuery orderByWednesdayTo($order = Criteria::ASC) Order by the wednesday_to column
 * @method     ChildWorkingTimesQuery orderByWednesdayLunchFrom($order = Criteria::ASC) Order by the wednesday_lunch_from column
 * @method     ChildWorkingTimesQuery orderByWednesdayLunchTo($order = Criteria::ASC) Order by the wednesday_lunch_to column
 * @method     ChildWorkingTimesQuery orderByWednesdayDayoff($order = Criteria::ASC) Order by the wednesday_dayoff column
 * @method     ChildWorkingTimesQuery orderByThursdayFrom($order = Criteria::ASC) Order by the thursday_from column
 * @method     ChildWorkingTimesQuery orderByThursdayTo($order = Criteria::ASC) Order by the thursday_to column
 * @method     ChildWorkingTimesQuery orderByThursdayLunchFrom($order = Criteria::ASC) Order by the thursday_lunch_from column
 * @method     ChildWorkingTimesQuery orderByThursdayLunchTo($order = Criteria::ASC) Order by the thursday_lunch_to column
 * @method     ChildWorkingTimesQuery orderByThursdayDayoff($order = Criteria::ASC) Order by the thursday_dayoff column
 * @method     ChildWorkingTimesQuery orderByFridayFrom($order = Criteria::ASC) Order by the friday_from column
 * @method     ChildWorkingTimesQuery orderByFridayTo($order = Criteria::ASC) Order by the friday_to column
 * @method     ChildWorkingTimesQuery orderByFridayLunchFrom($order = Criteria::ASC) Order by the friday_lunch_from column
 * @method     ChildWorkingTimesQuery orderByFridayLunchTo($order = Criteria::ASC) Order by the friday_lunch_to column
 * @method     ChildWorkingTimesQuery orderByFridayDayoff($order = Criteria::ASC) Order by the friday_dayoff column
 * @method     ChildWorkingTimesQuery orderBySaturdayFrom($order = Criteria::ASC) Order by the saturday_from column
 * @method     ChildWorkingTimesQuery orderBySaturdayTo($order = Criteria::ASC) Order by the saturday_to column
 * @method     ChildWorkingTimesQuery orderBySaturdayLunchFrom($order = Criteria::ASC) Order by the saturday_lunch_from column
 * @method     ChildWorkingTimesQuery orderBySaturdayLunchTo($order = Criteria::ASC) Order by the saturday_lunch_to column
 * @method     ChildWorkingTimesQuery orderBySaturdayDayoff($order = Criteria::ASC) Order by the saturday_dayoff column
 * @method     ChildWorkingTimesQuery orderBySundayFrom($order = Criteria::ASC) Order by the sunday_from column
 * @method     ChildWorkingTimesQuery orderBySundayTo($order = Criteria::ASC) Order by the sunday_to column
 * @method     ChildWorkingTimesQuery orderBySundayLunchFrom($order = Criteria::ASC) Order by the sunday_lunch_from column
 * @method     ChildWorkingTimesQuery orderBySundayLunchTo($order = Criteria::ASC) Order by the sunday_lunch_to column
 * @method     ChildWorkingTimesQuery orderBySundayDayoff($order = Criteria::ASC) Order by the sunday_dayoff column
 *
 * @method     ChildWorkingTimesQuery groupById() Group by the id column
 * @method     ChildWorkingTimesQuery groupByForeignId() Group by the foreign_id column
 * @method     ChildWorkingTimesQuery groupByType() Group by the type column
 * @method     ChildWorkingTimesQuery groupByMondayFrom() Group by the monday_from column
 * @method     ChildWorkingTimesQuery groupByMondayTo() Group by the monday_to column
 * @method     ChildWorkingTimesQuery groupByMondayLunchFrom() Group by the monday_lunch_from column
 * @method     ChildWorkingTimesQuery groupByMondayLunchTo() Group by the monday_lunch_to column
 * @method     ChildWorkingTimesQuery groupByMondayDayoff() Group by the monday_dayoff column
 * @method     ChildWorkingTimesQuery groupByTuesdayFrom() Group by the tuesday_from column
 * @method     ChildWorkingTimesQuery groupByTuesdayTo() Group by the tuesday_to column
 * @method     ChildWorkingTimesQuery groupByTuesdayLunchFrom() Group by the tuesday_lunch_from column
 * @method     ChildWorkingTimesQuery groupByTuesdayLunchTo() Group by the tuesday_lunch_to column
 * @method     ChildWorkingTimesQuery groupByTuesdayDayoff() Group by the tuesday_dayoff column
 * @method     ChildWorkingTimesQuery groupByWednesdayFrom() Group by the wednesday_from column
 * @method     ChildWorkingTimesQuery groupByWednesdayTo() Group by the wednesday_to column
 * @method     ChildWorkingTimesQuery groupByWednesdayLunchFrom() Group by the wednesday_lunch_from column
 * @method     ChildWorkingTimesQuery groupByWednesdayLunchTo() Group by the wednesday_lunch_to column
 * @method     ChildWorkingTimesQuery groupByWednesdayDayoff() Group by the wednesday_dayoff column
 * @method     ChildWorkingTimesQuery groupByThursdayFrom() Group by the thursday_from column
 * @method     ChildWorkingTimesQuery groupByThursdayTo() Group by the thursday_to column
 * @method     ChildWorkingTimesQuery groupByThursdayLunchFrom() Group by the thursday_lunch_from column
 * @method     ChildWorkingTimesQuery groupByThursdayLunchTo() Group by the thursday_lunch_to column
 * @method     ChildWorkingTimesQuery groupByThursdayDayoff() Group by the thursday_dayoff column
 * @method     ChildWorkingTimesQuery groupByFridayFrom() Group by the friday_from column
 * @method     ChildWorkingTimesQuery groupByFridayTo() Group by the friday_to column
 * @method     ChildWorkingTimesQuery groupByFridayLunchFrom() Group by the friday_lunch_from column
 * @method     ChildWorkingTimesQuery groupByFridayLunchTo() Group by the friday_lunch_to column
 * @method     ChildWorkingTimesQuery groupByFridayDayoff() Group by the friday_dayoff column
 * @method     ChildWorkingTimesQuery groupBySaturdayFrom() Group by the saturday_from column
 * @method     ChildWorkingTimesQuery groupBySaturdayTo() Group by the saturday_to column
 * @method     ChildWorkingTimesQuery groupBySaturdayLunchFrom() Group by the saturday_lunch_from column
 * @method     ChildWorkingTimesQuery groupBySaturdayLunchTo() Group by the saturday_lunch_to column
 * @method     ChildWorkingTimesQuery groupBySaturdayDayoff() Group by the saturday_dayoff column
 * @method     ChildWorkingTimesQuery groupBySundayFrom() Group by the sunday_from column
 * @method     ChildWorkingTimesQuery groupBySundayTo() Group by the sunday_to column
 * @method     ChildWorkingTimesQuery groupBySundayLunchFrom() Group by the sunday_lunch_from column
 * @method     ChildWorkingTimesQuery groupBySundayLunchTo() Group by the sunday_lunch_to column
 * @method     ChildWorkingTimesQuery groupBySundayDayoff() Group by the sunday_dayoff column
 *
 * @method     ChildWorkingTimesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWorkingTimesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWorkingTimesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWorkingTimes findOne(ConnectionInterface $con = null) Return the first ChildWorkingTimes matching the query
 * @method     ChildWorkingTimes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWorkingTimes matching the query, or a new ChildWorkingTimes object populated from the query conditions when no match is found
 *
 * @method     ChildWorkingTimes findOneById(int $id) Return the first ChildWorkingTimes filtered by the id column
 * @method     ChildWorkingTimes findOneByForeignId(int $foreign_id) Return the first ChildWorkingTimes filtered by the foreign_id column
 * @method     ChildWorkingTimes findOneByType(string $type) Return the first ChildWorkingTimes filtered by the type column
 * @method     ChildWorkingTimes findOneByMondayFrom(string $monday_from) Return the first ChildWorkingTimes filtered by the monday_from column
 * @method     ChildWorkingTimes findOneByMondayTo(string $monday_to) Return the first ChildWorkingTimes filtered by the monday_to column
 * @method     ChildWorkingTimes findOneByMondayLunchFrom(string $monday_lunch_from) Return the first ChildWorkingTimes filtered by the monday_lunch_from column
 * @method     ChildWorkingTimes findOneByMondayLunchTo(string $monday_lunch_to) Return the first ChildWorkingTimes filtered by the monday_lunch_to column
 * @method     ChildWorkingTimes findOneByMondayDayoff(string $monday_dayoff) Return the first ChildWorkingTimes filtered by the monday_dayoff column
 * @method     ChildWorkingTimes findOneByTuesdayFrom(string $tuesday_from) Return the first ChildWorkingTimes filtered by the tuesday_from column
 * @method     ChildWorkingTimes findOneByTuesdayTo(string $tuesday_to) Return the first ChildWorkingTimes filtered by the tuesday_to column
 * @method     ChildWorkingTimes findOneByTuesdayLunchFrom(string $tuesday_lunch_from) Return the first ChildWorkingTimes filtered by the tuesday_lunch_from column
 * @method     ChildWorkingTimes findOneByTuesdayLunchTo(string $tuesday_lunch_to) Return the first ChildWorkingTimes filtered by the tuesday_lunch_to column
 * @method     ChildWorkingTimes findOneByTuesdayDayoff(string $tuesday_dayoff) Return the first ChildWorkingTimes filtered by the tuesday_dayoff column
 * @method     ChildWorkingTimes findOneByWednesdayFrom(string $wednesday_from) Return the first ChildWorkingTimes filtered by the wednesday_from column
 * @method     ChildWorkingTimes findOneByWednesdayTo(string $wednesday_to) Return the first ChildWorkingTimes filtered by the wednesday_to column
 * @method     ChildWorkingTimes findOneByWednesdayLunchFrom(string $wednesday_lunch_from) Return the first ChildWorkingTimes filtered by the wednesday_lunch_from column
 * @method     ChildWorkingTimes findOneByWednesdayLunchTo(string $wednesday_lunch_to) Return the first ChildWorkingTimes filtered by the wednesday_lunch_to column
 * @method     ChildWorkingTimes findOneByWednesdayDayoff(string $wednesday_dayoff) Return the first ChildWorkingTimes filtered by the wednesday_dayoff column
 * @method     ChildWorkingTimes findOneByThursdayFrom(string $thursday_from) Return the first ChildWorkingTimes filtered by the thursday_from column
 * @method     ChildWorkingTimes findOneByThursdayTo(string $thursday_to) Return the first ChildWorkingTimes filtered by the thursday_to column
 * @method     ChildWorkingTimes findOneByThursdayLunchFrom(string $thursday_lunch_from) Return the first ChildWorkingTimes filtered by the thursday_lunch_from column
 * @method     ChildWorkingTimes findOneByThursdayLunchTo(string $thursday_lunch_to) Return the first ChildWorkingTimes filtered by the thursday_lunch_to column
 * @method     ChildWorkingTimes findOneByThursdayDayoff(string $thursday_dayoff) Return the first ChildWorkingTimes filtered by the thursday_dayoff column
 * @method     ChildWorkingTimes findOneByFridayFrom(string $friday_from) Return the first ChildWorkingTimes filtered by the friday_from column
 * @method     ChildWorkingTimes findOneByFridayTo(string $friday_to) Return the first ChildWorkingTimes filtered by the friday_to column
 * @method     ChildWorkingTimes findOneByFridayLunchFrom(string $friday_lunch_from) Return the first ChildWorkingTimes filtered by the friday_lunch_from column
 * @method     ChildWorkingTimes findOneByFridayLunchTo(string $friday_lunch_to) Return the first ChildWorkingTimes filtered by the friday_lunch_to column
 * @method     ChildWorkingTimes findOneByFridayDayoff(string $friday_dayoff) Return the first ChildWorkingTimes filtered by the friday_dayoff column
 * @method     ChildWorkingTimes findOneBySaturdayFrom(string $saturday_from) Return the first ChildWorkingTimes filtered by the saturday_from column
 * @method     ChildWorkingTimes findOneBySaturdayTo(string $saturday_to) Return the first ChildWorkingTimes filtered by the saturday_to column
 * @method     ChildWorkingTimes findOneBySaturdayLunchFrom(string $saturday_lunch_from) Return the first ChildWorkingTimes filtered by the saturday_lunch_from column
 * @method     ChildWorkingTimes findOneBySaturdayLunchTo(string $saturday_lunch_to) Return the first ChildWorkingTimes filtered by the saturday_lunch_to column
 * @method     ChildWorkingTimes findOneBySaturdayDayoff(string $saturday_dayoff) Return the first ChildWorkingTimes filtered by the saturday_dayoff column
 * @method     ChildWorkingTimes findOneBySundayFrom(string $sunday_from) Return the first ChildWorkingTimes filtered by the sunday_from column
 * @method     ChildWorkingTimes findOneBySundayTo(string $sunday_to) Return the first ChildWorkingTimes filtered by the sunday_to column
 * @method     ChildWorkingTimes findOneBySundayLunchFrom(string $sunday_lunch_from) Return the first ChildWorkingTimes filtered by the sunday_lunch_from column
 * @method     ChildWorkingTimes findOneBySundayLunchTo(string $sunday_lunch_to) Return the first ChildWorkingTimes filtered by the sunday_lunch_to column
 * @method     ChildWorkingTimes findOneBySundayDayoff(string $sunday_dayoff) Return the first ChildWorkingTimes filtered by the sunday_dayoff column
 *
 * @method     array findById(int $id) Return ChildWorkingTimes objects filtered by the id column
 * @method     array findByForeignId(int $foreign_id) Return ChildWorkingTimes objects filtered by the foreign_id column
 * @method     array findByType(string $type) Return ChildWorkingTimes objects filtered by the type column
 * @method     array findByMondayFrom(string $monday_from) Return ChildWorkingTimes objects filtered by the monday_from column
 * @method     array findByMondayTo(string $monday_to) Return ChildWorkingTimes objects filtered by the monday_to column
 * @method     array findByMondayLunchFrom(string $monday_lunch_from) Return ChildWorkingTimes objects filtered by the monday_lunch_from column
 * @method     array findByMondayLunchTo(string $monday_lunch_to) Return ChildWorkingTimes objects filtered by the monday_lunch_to column
 * @method     array findByMondayDayoff(string $monday_dayoff) Return ChildWorkingTimes objects filtered by the monday_dayoff column
 * @method     array findByTuesdayFrom(string $tuesday_from) Return ChildWorkingTimes objects filtered by the tuesday_from column
 * @method     array findByTuesdayTo(string $tuesday_to) Return ChildWorkingTimes objects filtered by the tuesday_to column
 * @method     array findByTuesdayLunchFrom(string $tuesday_lunch_from) Return ChildWorkingTimes objects filtered by the tuesday_lunch_from column
 * @method     array findByTuesdayLunchTo(string $tuesday_lunch_to) Return ChildWorkingTimes objects filtered by the tuesday_lunch_to column
 * @method     array findByTuesdayDayoff(string $tuesday_dayoff) Return ChildWorkingTimes objects filtered by the tuesday_dayoff column
 * @method     array findByWednesdayFrom(string $wednesday_from) Return ChildWorkingTimes objects filtered by the wednesday_from column
 * @method     array findByWednesdayTo(string $wednesday_to) Return ChildWorkingTimes objects filtered by the wednesday_to column
 * @method     array findByWednesdayLunchFrom(string $wednesday_lunch_from) Return ChildWorkingTimes objects filtered by the wednesday_lunch_from column
 * @method     array findByWednesdayLunchTo(string $wednesday_lunch_to) Return ChildWorkingTimes objects filtered by the wednesday_lunch_to column
 * @method     array findByWednesdayDayoff(string $wednesday_dayoff) Return ChildWorkingTimes objects filtered by the wednesday_dayoff column
 * @method     array findByThursdayFrom(string $thursday_from) Return ChildWorkingTimes objects filtered by the thursday_from column
 * @method     array findByThursdayTo(string $thursday_to) Return ChildWorkingTimes objects filtered by the thursday_to column
 * @method     array findByThursdayLunchFrom(string $thursday_lunch_from) Return ChildWorkingTimes objects filtered by the thursday_lunch_from column
 * @method     array findByThursdayLunchTo(string $thursday_lunch_to) Return ChildWorkingTimes objects filtered by the thursday_lunch_to column
 * @method     array findByThursdayDayoff(string $thursday_dayoff) Return ChildWorkingTimes objects filtered by the thursday_dayoff column
 * @method     array findByFridayFrom(string $friday_from) Return ChildWorkingTimes objects filtered by the friday_from column
 * @method     array findByFridayTo(string $friday_to) Return ChildWorkingTimes objects filtered by the friday_to column
 * @method     array findByFridayLunchFrom(string $friday_lunch_from) Return ChildWorkingTimes objects filtered by the friday_lunch_from column
 * @method     array findByFridayLunchTo(string $friday_lunch_to) Return ChildWorkingTimes objects filtered by the friday_lunch_to column
 * @method     array findByFridayDayoff(string $friday_dayoff) Return ChildWorkingTimes objects filtered by the friday_dayoff column
 * @method     array findBySaturdayFrom(string $saturday_from) Return ChildWorkingTimes objects filtered by the saturday_from column
 * @method     array findBySaturdayTo(string $saturday_to) Return ChildWorkingTimes objects filtered by the saturday_to column
 * @method     array findBySaturdayLunchFrom(string $saturday_lunch_from) Return ChildWorkingTimes objects filtered by the saturday_lunch_from column
 * @method     array findBySaturdayLunchTo(string $saturday_lunch_to) Return ChildWorkingTimes objects filtered by the saturday_lunch_to column
 * @method     array findBySaturdayDayoff(string $saturday_dayoff) Return ChildWorkingTimes objects filtered by the saturday_dayoff column
 * @method     array findBySundayFrom(string $sunday_from) Return ChildWorkingTimes objects filtered by the sunday_from column
 * @method     array findBySundayTo(string $sunday_to) Return ChildWorkingTimes objects filtered by the sunday_to column
 * @method     array findBySundayLunchFrom(string $sunday_lunch_from) Return ChildWorkingTimes objects filtered by the sunday_lunch_from column
 * @method     array findBySundayLunchTo(string $sunday_lunch_to) Return ChildWorkingTimes objects filtered by the sunday_lunch_to column
 * @method     array findBySundayDayoff(string $sunday_dayoff) Return ChildWorkingTimes objects filtered by the sunday_dayoff column
 *
 */
abstract class WorkingTimesQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \HookCalendar\Model\Base\WorkingTimesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\HookCalendar\\Model\\WorkingTimes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWorkingTimesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWorkingTimesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \HookCalendar\Model\WorkingTimesQuery) {
            return $criteria;
        }
        $query = new \HookCalendar\Model\WorkingTimesQuery();
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
     * @return ChildWorkingTimes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WorkingTimesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WorkingTimesTableMap::DATABASE_NAME);
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
     * @return   ChildWorkingTimes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, FOREIGN_ID, TYPE, MONDAY_FROM, MONDAY_TO, MONDAY_LUNCH_FROM, MONDAY_LUNCH_TO, MONDAY_DAYOFF, TUESDAY_FROM, TUESDAY_TO, TUESDAY_LUNCH_FROM, TUESDAY_LUNCH_TO, TUESDAY_DAYOFF, WEDNESDAY_FROM, WEDNESDAY_TO, WEDNESDAY_LUNCH_FROM, WEDNESDAY_LUNCH_TO, WEDNESDAY_DAYOFF, THURSDAY_FROM, THURSDAY_TO, THURSDAY_LUNCH_FROM, THURSDAY_LUNCH_TO, THURSDAY_DAYOFF, FRIDAY_FROM, FRIDAY_TO, FRIDAY_LUNCH_FROM, FRIDAY_LUNCH_TO, FRIDAY_DAYOFF, SATURDAY_FROM, SATURDAY_TO, SATURDAY_LUNCH_FROM, SATURDAY_LUNCH_TO, SATURDAY_DAYOFF, SUNDAY_FROM, SUNDAY_TO, SUNDAY_LUNCH_FROM, SUNDAY_LUNCH_TO, SUNDAY_DAYOFF FROM working_times WHERE ID = :p0';
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
            $obj = new ChildWorkingTimes();
            $obj->hydrate($row);
            WorkingTimesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildWorkingTimes|array|mixed the result, formatted by the current formatter
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
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WorkingTimesTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WorkingTimesTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the foreign_id column
     *
     * Example usage:
     * <code>
     * $query->filterByForeignId(1234); // WHERE foreign_id = 1234
     * $query->filterByForeignId(array(12, 34)); // WHERE foreign_id IN (12, 34)
     * $query->filterByForeignId(array('min' => 12)); // WHERE foreign_id > 12
     * </code>
     *
     * @param     mixed $foreignId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByForeignId($foreignId = null, $comparison = null)
    {
        if (is_array($foreignId)) {
            $useMinMax = false;
            if (isset($foreignId['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FOREIGN_ID, $foreignId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($foreignId['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FOREIGN_ID, $foreignId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::FOREIGN_ID, $foreignId, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the monday_from column
     *
     * Example usage:
     * <code>
     * $query->filterByMondayFrom('2011-03-14'); // WHERE monday_from = '2011-03-14'
     * $query->filterByMondayFrom('now'); // WHERE monday_from = '2011-03-14'
     * $query->filterByMondayFrom(array('max' => 'yesterday')); // WHERE monday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $mondayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByMondayFrom($mondayFrom = null, $comparison = null)
    {
        if (is_array($mondayFrom)) {
            $useMinMax = false;
            if (isset($mondayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_FROM, $mondayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mondayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_FROM, $mondayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::MONDAY_FROM, $mondayFrom, $comparison);
    }

    /**
     * Filter the query on the monday_to column
     *
     * Example usage:
     * <code>
     * $query->filterByMondayTo('2011-03-14'); // WHERE monday_to = '2011-03-14'
     * $query->filterByMondayTo('now'); // WHERE monday_to = '2011-03-14'
     * $query->filterByMondayTo(array('max' => 'yesterday')); // WHERE monday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $mondayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByMondayTo($mondayTo = null, $comparison = null)
    {
        if (is_array($mondayTo)) {
            $useMinMax = false;
            if (isset($mondayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_TO, $mondayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mondayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_TO, $mondayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::MONDAY_TO, $mondayTo, $comparison);
    }

    /**
     * Filter the query on the monday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterByMondayLunchFrom('2011-03-14'); // WHERE monday_lunch_from = '2011-03-14'
     * $query->filterByMondayLunchFrom('now'); // WHERE monday_lunch_from = '2011-03-14'
     * $query->filterByMondayLunchFrom(array('max' => 'yesterday')); // WHERE monday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $mondayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByMondayLunchFrom($mondayLunchFrom = null, $comparison = null)
    {
        if (is_array($mondayLunchFrom)) {
            $useMinMax = false;
            if (isset($mondayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_LUNCH_FROM, $mondayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mondayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_LUNCH_FROM, $mondayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::MONDAY_LUNCH_FROM, $mondayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the monday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterByMondayLunchTo('2011-03-14'); // WHERE monday_lunch_to = '2011-03-14'
     * $query->filterByMondayLunchTo('now'); // WHERE monday_lunch_to = '2011-03-14'
     * $query->filterByMondayLunchTo(array('max' => 'yesterday')); // WHERE monday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $mondayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByMondayLunchTo($mondayLunchTo = null, $comparison = null)
    {
        if (is_array($mondayLunchTo)) {
            $useMinMax = false;
            if (isset($mondayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_LUNCH_TO, $mondayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mondayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::MONDAY_LUNCH_TO, $mondayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::MONDAY_LUNCH_TO, $mondayLunchTo, $comparison);
    }

    /**
     * Filter the query on the monday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterByMondayDayoff('fooValue');   // WHERE monday_dayoff = 'fooValue'
     * $query->filterByMondayDayoff('%fooValue%'); // WHERE monday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mondayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByMondayDayoff($mondayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mondayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mondayDayoff)) {
                $mondayDayoff = str_replace('*', '%', $mondayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::MONDAY_DAYOFF, $mondayDayoff, $comparison);
    }

    /**
     * Filter the query on the tuesday_from column
     *
     * Example usage:
     * <code>
     * $query->filterByTuesdayFrom('2011-03-14'); // WHERE tuesday_from = '2011-03-14'
     * $query->filterByTuesdayFrom('now'); // WHERE tuesday_from = '2011-03-14'
     * $query->filterByTuesdayFrom(array('max' => 'yesterday')); // WHERE tuesday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $tuesdayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByTuesdayFrom($tuesdayFrom = null, $comparison = null)
    {
        if (is_array($tuesdayFrom)) {
            $useMinMax = false;
            if (isset($tuesdayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_FROM, $tuesdayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tuesdayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_FROM, $tuesdayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_FROM, $tuesdayFrom, $comparison);
    }

    /**
     * Filter the query on the tuesday_to column
     *
     * Example usage:
     * <code>
     * $query->filterByTuesdayTo('2011-03-14'); // WHERE tuesday_to = '2011-03-14'
     * $query->filterByTuesdayTo('now'); // WHERE tuesday_to = '2011-03-14'
     * $query->filterByTuesdayTo(array('max' => 'yesterday')); // WHERE tuesday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $tuesdayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByTuesdayTo($tuesdayTo = null, $comparison = null)
    {
        if (is_array($tuesdayTo)) {
            $useMinMax = false;
            if (isset($tuesdayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_TO, $tuesdayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tuesdayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_TO, $tuesdayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_TO, $tuesdayTo, $comparison);
    }

    /**
     * Filter the query on the tuesday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterByTuesdayLunchFrom('2011-03-14'); // WHERE tuesday_lunch_from = '2011-03-14'
     * $query->filterByTuesdayLunchFrom('now'); // WHERE tuesday_lunch_from = '2011-03-14'
     * $query->filterByTuesdayLunchFrom(array('max' => 'yesterday')); // WHERE tuesday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $tuesdayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByTuesdayLunchFrom($tuesdayLunchFrom = null, $comparison = null)
    {
        if (is_array($tuesdayLunchFrom)) {
            $useMinMax = false;
            if (isset($tuesdayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_LUNCH_FROM, $tuesdayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tuesdayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_LUNCH_FROM, $tuesdayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_LUNCH_FROM, $tuesdayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the tuesday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterByTuesdayLunchTo('2011-03-14'); // WHERE tuesday_lunch_to = '2011-03-14'
     * $query->filterByTuesdayLunchTo('now'); // WHERE tuesday_lunch_to = '2011-03-14'
     * $query->filterByTuesdayLunchTo(array('max' => 'yesterday')); // WHERE tuesday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $tuesdayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByTuesdayLunchTo($tuesdayLunchTo = null, $comparison = null)
    {
        if (is_array($tuesdayLunchTo)) {
            $useMinMax = false;
            if (isset($tuesdayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_LUNCH_TO, $tuesdayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tuesdayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_LUNCH_TO, $tuesdayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_LUNCH_TO, $tuesdayLunchTo, $comparison);
    }

    /**
     * Filter the query on the tuesday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterByTuesdayDayoff('fooValue');   // WHERE tuesday_dayoff = 'fooValue'
     * $query->filterByTuesdayDayoff('%fooValue%'); // WHERE tuesday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tuesdayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByTuesdayDayoff($tuesdayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tuesdayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tuesdayDayoff)) {
                $tuesdayDayoff = str_replace('*', '%', $tuesdayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::TUESDAY_DAYOFF, $tuesdayDayoff, $comparison);
    }

    /**
     * Filter the query on the wednesday_from column
     *
     * Example usage:
     * <code>
     * $query->filterByWednesdayFrom('2011-03-14'); // WHERE wednesday_from = '2011-03-14'
     * $query->filterByWednesdayFrom('now'); // WHERE wednesday_from = '2011-03-14'
     * $query->filterByWednesdayFrom(array('max' => 'yesterday')); // WHERE wednesday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $wednesdayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByWednesdayFrom($wednesdayFrom = null, $comparison = null)
    {
        if (is_array($wednesdayFrom)) {
            $useMinMax = false;
            if (isset($wednesdayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_FROM, $wednesdayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wednesdayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_FROM, $wednesdayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_FROM, $wednesdayFrom, $comparison);
    }

    /**
     * Filter the query on the wednesday_to column
     *
     * Example usage:
     * <code>
     * $query->filterByWednesdayTo('2011-03-14'); // WHERE wednesday_to = '2011-03-14'
     * $query->filterByWednesdayTo('now'); // WHERE wednesday_to = '2011-03-14'
     * $query->filterByWednesdayTo(array('max' => 'yesterday')); // WHERE wednesday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $wednesdayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByWednesdayTo($wednesdayTo = null, $comparison = null)
    {
        if (is_array($wednesdayTo)) {
            $useMinMax = false;
            if (isset($wednesdayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_TO, $wednesdayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wednesdayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_TO, $wednesdayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_TO, $wednesdayTo, $comparison);
    }

    /**
     * Filter the query on the wednesday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterByWednesdayLunchFrom('2011-03-14'); // WHERE wednesday_lunch_from = '2011-03-14'
     * $query->filterByWednesdayLunchFrom('now'); // WHERE wednesday_lunch_from = '2011-03-14'
     * $query->filterByWednesdayLunchFrom(array('max' => 'yesterday')); // WHERE wednesday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $wednesdayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByWednesdayLunchFrom($wednesdayLunchFrom = null, $comparison = null)
    {
        if (is_array($wednesdayLunchFrom)) {
            $useMinMax = false;
            if (isset($wednesdayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM, $wednesdayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wednesdayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM, $wednesdayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_LUNCH_FROM, $wednesdayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the wednesday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterByWednesdayLunchTo('2011-03-14'); // WHERE wednesday_lunch_to = '2011-03-14'
     * $query->filterByWednesdayLunchTo('now'); // WHERE wednesday_lunch_to = '2011-03-14'
     * $query->filterByWednesdayLunchTo(array('max' => 'yesterday')); // WHERE wednesday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $wednesdayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByWednesdayLunchTo($wednesdayLunchTo = null, $comparison = null)
    {
        if (is_array($wednesdayLunchTo)) {
            $useMinMax = false;
            if (isset($wednesdayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO, $wednesdayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wednesdayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO, $wednesdayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_LUNCH_TO, $wednesdayLunchTo, $comparison);
    }

    /**
     * Filter the query on the wednesday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterByWednesdayDayoff('fooValue');   // WHERE wednesday_dayoff = 'fooValue'
     * $query->filterByWednesdayDayoff('%fooValue%'); // WHERE wednesday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wednesdayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByWednesdayDayoff($wednesdayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wednesdayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $wednesdayDayoff)) {
                $wednesdayDayoff = str_replace('*', '%', $wednesdayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::WEDNESDAY_DAYOFF, $wednesdayDayoff, $comparison);
    }

    /**
     * Filter the query on the thursday_from column
     *
     * Example usage:
     * <code>
     * $query->filterByThursdayFrom('2011-03-14'); // WHERE thursday_from = '2011-03-14'
     * $query->filterByThursdayFrom('now'); // WHERE thursday_from = '2011-03-14'
     * $query->filterByThursdayFrom(array('max' => 'yesterday')); // WHERE thursday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $thursdayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByThursdayFrom($thursdayFrom = null, $comparison = null)
    {
        if (is_array($thursdayFrom)) {
            $useMinMax = false;
            if (isset($thursdayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_FROM, $thursdayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thursdayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_FROM, $thursdayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_FROM, $thursdayFrom, $comparison);
    }

    /**
     * Filter the query on the thursday_to column
     *
     * Example usage:
     * <code>
     * $query->filterByThursdayTo('2011-03-14'); // WHERE thursday_to = '2011-03-14'
     * $query->filterByThursdayTo('now'); // WHERE thursday_to = '2011-03-14'
     * $query->filterByThursdayTo(array('max' => 'yesterday')); // WHERE thursday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $thursdayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByThursdayTo($thursdayTo = null, $comparison = null)
    {
        if (is_array($thursdayTo)) {
            $useMinMax = false;
            if (isset($thursdayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_TO, $thursdayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thursdayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_TO, $thursdayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_TO, $thursdayTo, $comparison);
    }

    /**
     * Filter the query on the thursday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterByThursdayLunchFrom('2011-03-14'); // WHERE thursday_lunch_from = '2011-03-14'
     * $query->filterByThursdayLunchFrom('now'); // WHERE thursday_lunch_from = '2011-03-14'
     * $query->filterByThursdayLunchFrom(array('max' => 'yesterday')); // WHERE thursday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $thursdayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByThursdayLunchFrom($thursdayLunchFrom = null, $comparison = null)
    {
        if (is_array($thursdayLunchFrom)) {
            $useMinMax = false;
            if (isset($thursdayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_LUNCH_FROM, $thursdayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thursdayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_LUNCH_FROM, $thursdayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_LUNCH_FROM, $thursdayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the thursday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterByThursdayLunchTo('2011-03-14'); // WHERE thursday_lunch_to = '2011-03-14'
     * $query->filterByThursdayLunchTo('now'); // WHERE thursday_lunch_to = '2011-03-14'
     * $query->filterByThursdayLunchTo(array('max' => 'yesterday')); // WHERE thursday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $thursdayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByThursdayLunchTo($thursdayLunchTo = null, $comparison = null)
    {
        if (is_array($thursdayLunchTo)) {
            $useMinMax = false;
            if (isset($thursdayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_LUNCH_TO, $thursdayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thursdayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_LUNCH_TO, $thursdayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_LUNCH_TO, $thursdayLunchTo, $comparison);
    }

    /**
     * Filter the query on the thursday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterByThursdayDayoff('fooValue');   // WHERE thursday_dayoff = 'fooValue'
     * $query->filterByThursdayDayoff('%fooValue%'); // WHERE thursday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $thursdayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByThursdayDayoff($thursdayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($thursdayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $thursdayDayoff)) {
                $thursdayDayoff = str_replace('*', '%', $thursdayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::THURSDAY_DAYOFF, $thursdayDayoff, $comparison);
    }

    /**
     * Filter the query on the friday_from column
     *
     * Example usage:
     * <code>
     * $query->filterByFridayFrom('2011-03-14'); // WHERE friday_from = '2011-03-14'
     * $query->filterByFridayFrom('now'); // WHERE friday_from = '2011-03-14'
     * $query->filterByFridayFrom(array('max' => 'yesterday')); // WHERE friday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $fridayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByFridayFrom($fridayFrom = null, $comparison = null)
    {
        if (is_array($fridayFrom)) {
            $useMinMax = false;
            if (isset($fridayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_FROM, $fridayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fridayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_FROM, $fridayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_FROM, $fridayFrom, $comparison);
    }

    /**
     * Filter the query on the friday_to column
     *
     * Example usage:
     * <code>
     * $query->filterByFridayTo('2011-03-14'); // WHERE friday_to = '2011-03-14'
     * $query->filterByFridayTo('now'); // WHERE friday_to = '2011-03-14'
     * $query->filterByFridayTo(array('max' => 'yesterday')); // WHERE friday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $fridayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByFridayTo($fridayTo = null, $comparison = null)
    {
        if (is_array($fridayTo)) {
            $useMinMax = false;
            if (isset($fridayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_TO, $fridayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fridayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_TO, $fridayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_TO, $fridayTo, $comparison);
    }

    /**
     * Filter the query on the friday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterByFridayLunchFrom('2011-03-14'); // WHERE friday_lunch_from = '2011-03-14'
     * $query->filterByFridayLunchFrom('now'); // WHERE friday_lunch_from = '2011-03-14'
     * $query->filterByFridayLunchFrom(array('max' => 'yesterday')); // WHERE friday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $fridayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByFridayLunchFrom($fridayLunchFrom = null, $comparison = null)
    {
        if (is_array($fridayLunchFrom)) {
            $useMinMax = false;
            if (isset($fridayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_LUNCH_FROM, $fridayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fridayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_LUNCH_FROM, $fridayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_LUNCH_FROM, $fridayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the friday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterByFridayLunchTo('2011-03-14'); // WHERE friday_lunch_to = '2011-03-14'
     * $query->filterByFridayLunchTo('now'); // WHERE friday_lunch_to = '2011-03-14'
     * $query->filterByFridayLunchTo(array('max' => 'yesterday')); // WHERE friday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $fridayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByFridayLunchTo($fridayLunchTo = null, $comparison = null)
    {
        if (is_array($fridayLunchTo)) {
            $useMinMax = false;
            if (isset($fridayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_LUNCH_TO, $fridayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fridayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_LUNCH_TO, $fridayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_LUNCH_TO, $fridayLunchTo, $comparison);
    }

    /**
     * Filter the query on the friday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterByFridayDayoff('fooValue');   // WHERE friday_dayoff = 'fooValue'
     * $query->filterByFridayDayoff('%fooValue%'); // WHERE friday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fridayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterByFridayDayoff($fridayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fridayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fridayDayoff)) {
                $fridayDayoff = str_replace('*', '%', $fridayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::FRIDAY_DAYOFF, $fridayDayoff, $comparison);
    }

    /**
     * Filter the query on the saturday_from column
     *
     * Example usage:
     * <code>
     * $query->filterBySaturdayFrom('2011-03-14'); // WHERE saturday_from = '2011-03-14'
     * $query->filterBySaturdayFrom('now'); // WHERE saturday_from = '2011-03-14'
     * $query->filterBySaturdayFrom(array('max' => 'yesterday')); // WHERE saturday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $saturdayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySaturdayFrom($saturdayFrom = null, $comparison = null)
    {
        if (is_array($saturdayFrom)) {
            $useMinMax = false;
            if (isset($saturdayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_FROM, $saturdayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saturdayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_FROM, $saturdayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_FROM, $saturdayFrom, $comparison);
    }

    /**
     * Filter the query on the saturday_to column
     *
     * Example usage:
     * <code>
     * $query->filterBySaturdayTo('2011-03-14'); // WHERE saturday_to = '2011-03-14'
     * $query->filterBySaturdayTo('now'); // WHERE saturday_to = '2011-03-14'
     * $query->filterBySaturdayTo(array('max' => 'yesterday')); // WHERE saturday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $saturdayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySaturdayTo($saturdayTo = null, $comparison = null)
    {
        if (is_array($saturdayTo)) {
            $useMinMax = false;
            if (isset($saturdayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_TO, $saturdayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saturdayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_TO, $saturdayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_TO, $saturdayTo, $comparison);
    }

    /**
     * Filter the query on the saturday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterBySaturdayLunchFrom('2011-03-14'); // WHERE saturday_lunch_from = '2011-03-14'
     * $query->filterBySaturdayLunchFrom('now'); // WHERE saturday_lunch_from = '2011-03-14'
     * $query->filterBySaturdayLunchFrom(array('max' => 'yesterday')); // WHERE saturday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $saturdayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySaturdayLunchFrom($saturdayLunchFrom = null, $comparison = null)
    {
        if (is_array($saturdayLunchFrom)) {
            $useMinMax = false;
            if (isset($saturdayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_LUNCH_FROM, $saturdayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saturdayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_LUNCH_FROM, $saturdayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_LUNCH_FROM, $saturdayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the saturday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterBySaturdayLunchTo('2011-03-14'); // WHERE saturday_lunch_to = '2011-03-14'
     * $query->filterBySaturdayLunchTo('now'); // WHERE saturday_lunch_to = '2011-03-14'
     * $query->filterBySaturdayLunchTo(array('max' => 'yesterday')); // WHERE saturday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $saturdayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySaturdayLunchTo($saturdayLunchTo = null, $comparison = null)
    {
        if (is_array($saturdayLunchTo)) {
            $useMinMax = false;
            if (isset($saturdayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_LUNCH_TO, $saturdayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saturdayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_LUNCH_TO, $saturdayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_LUNCH_TO, $saturdayLunchTo, $comparison);
    }

    /**
     * Filter the query on the saturday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterBySaturdayDayoff('fooValue');   // WHERE saturday_dayoff = 'fooValue'
     * $query->filterBySaturdayDayoff('%fooValue%'); // WHERE saturday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saturdayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySaturdayDayoff($saturdayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saturdayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $saturdayDayoff)) {
                $saturdayDayoff = str_replace('*', '%', $saturdayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SATURDAY_DAYOFF, $saturdayDayoff, $comparison);
    }

    /**
     * Filter the query on the sunday_from column
     *
     * Example usage:
     * <code>
     * $query->filterBySundayFrom('2011-03-14'); // WHERE sunday_from = '2011-03-14'
     * $query->filterBySundayFrom('now'); // WHERE sunday_from = '2011-03-14'
     * $query->filterBySundayFrom(array('max' => 'yesterday')); // WHERE sunday_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $sundayFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySundayFrom($sundayFrom = null, $comparison = null)
    {
        if (is_array($sundayFrom)) {
            $useMinMax = false;
            if (isset($sundayFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_FROM, $sundayFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sundayFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_FROM, $sundayFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_FROM, $sundayFrom, $comparison);
    }

    /**
     * Filter the query on the sunday_to column
     *
     * Example usage:
     * <code>
     * $query->filterBySundayTo('2011-03-14'); // WHERE sunday_to = '2011-03-14'
     * $query->filterBySundayTo('now'); // WHERE sunday_to = '2011-03-14'
     * $query->filterBySundayTo(array('max' => 'yesterday')); // WHERE sunday_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $sundayTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySundayTo($sundayTo = null, $comparison = null)
    {
        if (is_array($sundayTo)) {
            $useMinMax = false;
            if (isset($sundayTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_TO, $sundayTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sundayTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_TO, $sundayTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_TO, $sundayTo, $comparison);
    }

    /**
     * Filter the query on the sunday_lunch_from column
     *
     * Example usage:
     * <code>
     * $query->filterBySundayLunchFrom('2011-03-14'); // WHERE sunday_lunch_from = '2011-03-14'
     * $query->filterBySundayLunchFrom('now'); // WHERE sunday_lunch_from = '2011-03-14'
     * $query->filterBySundayLunchFrom(array('max' => 'yesterday')); // WHERE sunday_lunch_from > '2011-03-13'
     * </code>
     *
     * @param     mixed $sundayLunchFrom The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySundayLunchFrom($sundayLunchFrom = null, $comparison = null)
    {
        if (is_array($sundayLunchFrom)) {
            $useMinMax = false;
            if (isset($sundayLunchFrom['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_LUNCH_FROM, $sundayLunchFrom['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sundayLunchFrom['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_LUNCH_FROM, $sundayLunchFrom['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_LUNCH_FROM, $sundayLunchFrom, $comparison);
    }

    /**
     * Filter the query on the sunday_lunch_to column
     *
     * Example usage:
     * <code>
     * $query->filterBySundayLunchTo('2011-03-14'); // WHERE sunday_lunch_to = '2011-03-14'
     * $query->filterBySundayLunchTo('now'); // WHERE sunday_lunch_to = '2011-03-14'
     * $query->filterBySundayLunchTo(array('max' => 'yesterday')); // WHERE sunday_lunch_to > '2011-03-13'
     * </code>
     *
     * @param     mixed $sundayLunchTo The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySundayLunchTo($sundayLunchTo = null, $comparison = null)
    {
        if (is_array($sundayLunchTo)) {
            $useMinMax = false;
            if (isset($sundayLunchTo['min'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_LUNCH_TO, $sundayLunchTo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sundayLunchTo['max'])) {
                $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_LUNCH_TO, $sundayLunchTo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_LUNCH_TO, $sundayLunchTo, $comparison);
    }

    /**
     * Filter the query on the sunday_dayoff column
     *
     * Example usage:
     * <code>
     * $query->filterBySundayDayoff('fooValue');   // WHERE sunday_dayoff = 'fooValue'
     * $query->filterBySundayDayoff('%fooValue%'); // WHERE sunday_dayoff LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sundayDayoff The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function filterBySundayDayoff($sundayDayoff = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sundayDayoff)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sundayDayoff)) {
                $sundayDayoff = str_replace('*', '%', $sundayDayoff);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WorkingTimesTableMap::SUNDAY_DAYOFF, $sundayDayoff, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWorkingTimes $workingTimes Object to remove from the list of results
     *
     * @return ChildWorkingTimesQuery The current query, for fluid interface
     */
    public function prune($workingTimes = null)
    {
        if ($workingTimes) {
            $this->addUsingAlias(WorkingTimesTableMap::ID, $workingTimes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the working_times table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WorkingTimesTableMap::DATABASE_NAME);
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
            WorkingTimesTableMap::clearInstancePool();
            WorkingTimesTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildWorkingTimes or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildWorkingTimes object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WorkingTimesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WorkingTimesTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        WorkingTimesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            WorkingTimesTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // WorkingTimesQuery
