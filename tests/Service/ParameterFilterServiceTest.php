<?php

namespace App\Tests\Service;

use App\Entity\Variant;
use App\Repository\VariantRepository;
use App\Service\ParameterFilterService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ParameterFilterServiceTest extends KernelTestCase
{
    public function testFilterWhenNoVariantsFound()
    {
        $repositoryMock = $this->createMock(VariantRepository::class);
        $repositoryMock->expects($this->any())
            ->method('findVariants')
            ->willReturn([]);

        $parameterFilter = new ParameterFilterService($repositoryMock);

        $this->assertEquals([], $parameterFilter->filter([]));
    }

    public function testFilterWhenNoParametersFound()
    {
        $repositoryMock = $this->createMock(VariantRepository::class);

        $repositoryMock->expects($this->any())
            ->method('findVariants')
            ->willReturn([
                (new Variant())->setCode('code_1')
            ]);

        $repositoryMock->expects($this->any())
            ->method('getParameters')
            ->willReturn([]);

        $parameterFilter = new ParameterFilterService($repositoryMock);

        $this->assertEquals([], $parameterFilter->filter([]));
    }

    public function testFilter()
    {
        $repositoryMock = $this->createMock(VariantRepository::class);

        $repositoryMock->expects($this->any())
            ->method('findVariants')
            ->willReturn([
                (new Variant())->setCode('code_1')
            ]);

        $repositoryMock->expects($this->any())
            ->method('getParameters')
            ->willReturn([
                [
                    'name' => 'parameter1',
                    'value' => 'A',
                ],
                [
                    'name' => 'parameter1',
                    'value' => 'B',
                ],
                [
                    'name' => 'parameter1',
                    'value' => 'C',
                ],
                [
                    'name' => 'parameter2',
                    'value' => 'C',
                ],
            ]);

        $parameterFilter = new ParameterFilterService($repositoryMock);

        $this->assertEquals(['parameter1' => ['A', 'B', 'C'], 'parameter2' => ['C']], $parameterFilter->filter([]));
    }
}
