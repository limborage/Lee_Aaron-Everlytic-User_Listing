<?php

namespace Components\UserComponent;

use App\Components\UserComponent\UserDetailsProcessor;
use PHPUnit\Framework\TestCase;

class UserDetailsProcessorTest extends TestCase
{
    private const MISSING_USER_DATA = [
        'surname' => '',
        'email' => '',
        'position' => ''
    ];

    private const GOOD_USER_DATA = [
        'name' => 'Test',
        'surname' => 'User',
        'email' => 'test@fake.com',
        'position' => 'Fake Position'
    ];

    /**
     * @var UserDetailsProcessor
     */
    private $detailsExtractor;

    protected function setUp()
    {
        parent::setUp();
        $this->detailsExtractor = new UserDetailsProcessor();
    }

    public function testGettingUserDetailsFromRequestWithMissingData()
    {
        // Given the user details processor class
        // When an array containing possible user details is given
        $userResults = $this->detailsExtractor->RequestUserDetailsExtractor(self::MISSING_USER_DATA);

        // Then test that all required user fields exist
        foreach (UserDetailsProcessor::USER_DETAIL_FIELDS as $userDetailField) {
            $this->assertArrayHasKey($userDetailField, $userResults);
        }
    }

    public function testGettingUserDetailsFromRequestWithGoodData()
    {
        // Given the user details processor class
        // When an array containing possible user details is given
        $userResults = $this->detailsExtractor->RequestUserDetailsExtractor(self::GOOD_USER_DATA);

        // Then test that all required user fields exist
        foreach (UserDetailsProcessor::USER_DETAIL_FIELDS as $userDetailField) {
            $this->assertArrayHasKey($userDetailField, $userResults);
        }
    }
}
