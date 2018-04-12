<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace SwoftTest\Db\Cases\Mysql;

use Swoft\Db\Query;
use SwoftTest\Db\Cases\AbstractMysqlCase;
use SwoftTest\Db\Testing\Entity\User;

/**
 * AggregateTest
 */
class AggregateTest extends AbstractMysqlCase
{
    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testCount(array $ids)
    {
        $count    = Query::table(User::class)->count('id', 'userCount')->getResult();
        $countNum = $count['userCount'];
        $this->assertTrue($countNum >= 2);
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testCountByCo(array $ids)
    {
        go(function () use ($ids) {
            $this->testCount($ids);
        });
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testSum(array $ids)
    {
        $ageNum    = Query::table(User::class)->sum('age', 'ageNum')->getResult();
        $ageNum = $ageNum['ageNum'];
        $this->assertTrue($ageNum >= 0);
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testSumByCo(array $ids)
    {
        go(function () use ($ids) {
            $this->testSum($ids);
        });
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testMax(array $ids)
    {
        $maxAge    = Query::table(User::class)->max('age', 'maxAge')->getResult();
        $maxAge = $maxAge['maxAge'];
        $this->assertTrue($maxAge >= 0);
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testMaxByCo(array $ids)
    {
        go(function () use ($ids) {
            $this->testMax($ids);
        });
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testMin(array $ids)
    {
        $minAge    = Query::table(User::class)->min('age', 'minAge')->getResult();
        $minAge = $minAge['minAge'];
        $this->assertTrue($minAge >= 0);
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testMinByCo(array $ids)
    {
        go(function () use ($ids) {
            $this->testMin($ids);
        });
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testAvg(array $ids)
    {
        $avgAge    = Query::table(User::class)->avg('age', 'avgAge')->getResult();
        $avgAge = $avgAge['avgAge'];
        $this->assertTrue($avgAge >= 0);
    }

    /**
     * @dataProvider mysqlProviders
     *
     * @param array $ids
     */
    public function testAvgByCo(array $ids)
    {
        go(function () use ($ids) {
            $this->testAvg($ids);
        });
    }
}
