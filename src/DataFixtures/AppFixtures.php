<?php

namespace App\DataFixtures;

use App\Entity\OptionValue;
use App\Entity\Parameter;
use App\Entity\ParameterOption;
use App\Entity\Variant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private function createParameter(ObjectManager $manager, string $name): Parameter
    {
        $parameter = new Parameter();
        $parameter->setName($name);
        $manager->persist($parameter);

        return $parameter;
    }

    private function createOptionValue(ObjectManager $manager, string $value): OptionValue
    {
        $option = new OptionValue();
        $option->setValue($value);
        $manager->persist($option);

        return $option;
    }

    private function createParameterOption(ObjectManager $manager, Parameter $parameter, OptionValue $optionValue): ParameterOption
    {
        $parameterOption = new ParameterOption();
        $parameterOption->setParameter($parameter);
        $parameterOption->setOptionValue($optionValue);
        $manager->persist($parameterOption);

        return $parameterOption;
    }

    private function createVariant(ObjectManager $manager, string $code, ParameterOption $parameterOption)
    {
        $variant = new Variant();
        $variant->setCode($code);
        $variant->setParameterOption($parameterOption);
        $manager->persist($variant);
    }

    public function load(ObjectManager $manager): void
    {
        $parameter1 = $this->createParameter($manager, 'parameter1');
        $parameter2 = $this->createParameter($manager, 'parameter2');

        $option1 = $this->createOptionValue($manager, 'A');
        $option2 = $this->createOptionValue($manager, 'B');
        $option3 = $this->createOptionValue($manager, 'C');
        $option4 = $this->createOptionValue($manager, 'X');
        $option5 = $this->createOptionValue($manager, 'Y');
        $option6 = $this->createOptionValue($manager, 'Z');

        $parameterOption1 =$this->createParameterOption($manager, $parameter1, $option1);
        $parameterOption2 =$this->createParameterOption($manager, $parameter1, $option2);
        $parameterOption3 =$this->createParameterOption($manager, $parameter1, $option3);
        $parameterOption4 =$this->createParameterOption($manager, $parameter2, $option4);
        $parameterOption5 =$this->createParameterOption($manager, $parameter2, $option5);
        $parameterOption6 =$this->createParameterOption($manager, $parameter2, $option6);


        $this->createVariant($manager, 1, $parameterOption1);
        $this->createVariant($manager, 1, $parameterOption4);

        $this->createVariant($manager, 2, $parameterOption1);
        $this->createVariant($manager, 2, $parameterOption6);

        $this->createVariant($manager, 3, $parameterOption2);
        $this->createVariant($manager, 3, $parameterOption4);

        $this->createVariant($manager, 4, $parameterOption2);
        $this->createVariant($manager, 4, $parameterOption5);

        $this->createVariant($manager, 5, $parameterOption2);
        $this->createVariant($manager, 5, $parameterOption6);

        $this->createVariant($manager, 6, $parameterOption3);
        $this->createVariant($manager, 6, $parameterOption4);

        $this->createVariant($manager, 7, $parameterOption4);
        $this->createVariant($manager, 7, $parameterOption5);

        $manager->flush();
    }
}
