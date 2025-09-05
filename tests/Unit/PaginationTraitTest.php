<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PaginationTraitTest extends TestCase
{
    /**
     * Test object which use pagination trait
     *
     * @var object
     */
    protected $testObject;

    /**
     * Set up the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->testObject = new class {
            use PaginationTrait;
        };
    }

    /**
     * Testing custom pagination trait for collection
     *
     * @return void
     */
    public function testGeneratePaginationForCollection()
    {
        // arrange
        // prepare collection of 50 items
        $collection = new Collection(array_fill(0, 50, 'item'));

        // create and Dummy Class instance

        $request = Request::create('/test-url?page=1');
        $perPage = 20;

        // act
        $paginator = $this->testObject->generatePagination($collection, $request, $perPage);

        // assert
        $this->assertInstanceOf(LengthAwarePaginator::class, $paginator);
        $this->assertEquals(50, $paginator->total());
        $this->assertEquals($perPage, $paginator->perPage());
        $this->assertCount($perPage, $paginator->items());
    }

    /**
     * Testing pagination for second page
     *
     * @return void
     */
    public function testGeneratePaginationForSecondPage()
    {
        // arrange
        $collection = new Collection(array_fill(0, 50, 'item'));
        $perPage = 20;
        $request = Request::create('/test-url?page=2');

        // act
        $paginator = $this->testObject->generatePagination($collection, $request, $perPage);

        // assert
        $this->assertCount(20, $paginator->items());
        $this->assertEquals(2, $paginator->currentPage());
    }

    /**
     * Testing custom pagination for last(third) page
     *
     * @return void
     */
    public function testGeneratePaginationForLastPage()
    {
        // arrange
        $collection = new Collection(array_fill(0, 50, 'item'));
        $perPage = 20;
        $request = Request::create('/test-url?page=3');

        // Act
        $paginator = $this->testObject->generatePagination($collection, $request, $perPage);

        // assert
        // 10 items expected (50 - 20 - 20).
        $this->assertCount(10, $paginator->items());
        $this->assertEquals(3, $paginator->currentPage());
    }
}
