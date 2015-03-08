<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Tests\Fixer\Contrib;

use Symfony\CS\Tests\Fixer\AbstractFixerTestBase;

/**
 * Fixer for latin1 projects, converts the utf8 files to latin1.
 *
 * @author Odín del Río Piñeiro <odin.drp@gmail.com>
 */
class Utf8ToLatin1FixerTest extends AbstractFixerTestBase
{
    /**
     * Test case for a uf8 file that should be converted.
     */
    public function testUtf8FileEncodedThatShouldBeFixed()
    {
        $inputFile = $this->getFixtureFile('text-utf8.txt');
        $inputContent = file_get_contents($inputFile->getRealPath());
        $expectedContent = file_get_contents($this->getFixtureFile('text-latin1.txt'));

        $this->makeTest($expectedContent, $inputContent, $inputFile);
    }

    /**
     * Test case for a file that is already latin1 encoded that should not be modified.
     */
    public function testLatin1EncodedFileThatShouldNotBeFixed()
    {
        $inputFile = $this->getFixtureFile('text-latin1.txt');
        $inputContent = file_get_contents($inputFile->getRealPath());

        $this->makeTest($inputContent, null, $inputFile);
    }

    /**
     * Returns the fixture files for this test.
     *
     * @param $fileName
     *
     * @return \SplFileInfo
     */
    private function getFixtureFile($fileName)
    {
        return $this->getTestFile(__DIR__.'/../../Fixtures/FixerTest/contrib/utf8-to-latin1/'.$fileName);
    }
}
