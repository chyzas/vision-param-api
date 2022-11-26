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
    public function load(ObjectManager $manager): void
    {
        $parameter1 = new Parameter();
        $parameter1->setName('parameter1');
        $manager->persist($parameter1);

        $parameter2 = new Parameter();
        $parameter2->setName('parameter1');
        $manager->persist($parameter2);

        $option1 = new OptionValue();
        $option1->setValue('A');
        $manager->persist($option1);

        $option2 = new OptionValue();
        $option2->setValue('B');
        $manager->persist($option2);

        $option3 = new OptionValue();
        $option3->setValue('C');
        $manager->persist($option3);

        $option4 = new OptionValue();
        $option4->setValue('X');
        $manager->persist($option4);

        $option5 = new OptionValue();
        $option5->setValue('Y');
        $manager->persist($option5);

        $option6 = new OptionValue();
        $option6->setValue('Z');
        $manager->persist($option6);


        $parameterOption1 = new ParameterOption();
        $parameterOption1->setParameter($parameter1);
        $parameterOption1->setOptionValue($option1);
        $manager->persist($parameterOption1);


        $parameterOption2 = new ParameterOption();
        $parameterOption2->setParameter($parameter1);
        $parameterOption2->setOptionValue($option2);
        $manager->persist($parameterOption2);

        $parameterOption3 = new ParameterOption();
        $parameterOption3->setParameter($parameter1);
        $parameterOption3->setOptionValue($option3);
        $manager->persist($parameterOption3);

        $parameterOption4 = new ParameterOption();
        $parameterOption4->setParameter($parameter2);
        $parameterOption4->setOptionValue($option4);
        $manager->persist($parameterOption4);

        $parameterOption5 = new ParameterOption();
        $parameterOption5->setParameter($parameter2);
        $parameterOption5->setOptionValue($option5);
        $manager->persist($parameterOption5);

        $parameterOption6 = new ParameterOption();
        $parameterOption6->setParameter($parameter2);
        $parameterOption6->setOptionValue($option6);
        $manager->persist($parameterOption6);


        $combination1 = new Variant();
        $combination1->setCode(1);
        $combination1->setParameterOption($parameterOption1);
        $manager->persist($combination1);

        $combination2 = new Variant();
        $combination2->setCode(1);
        $combination2->setParameterOption($parameterOption4);
        $manager->persist($combination2);

        $combination3 = new Variant();
        $combination3->setCode(2);
        $combination3->setParameterOption($parameterOption1);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(2);
        $combination3->setParameterOption($parameterOption6);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(3);
        $combination3->setParameterOption($parameterOption2);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(3);
        $combination3->setParameterOption($parameterOption4);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(4);
        $combination3->setParameterOption($parameterOption2);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(4);
        $combination3->setParameterOption($parameterOption5);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(5);
        $combination3->setParameterOption($parameterOption2);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(5);
        $combination3->setParameterOption($parameterOption6);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(6);
        $combination3->setParameterOption($parameterOption3);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(6);
        $combination3->setParameterOption($parameterOption4);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(7);
        $combination3->setParameterOption($parameterOption4);
        $manager->persist($combination3);

        $combination3 = new Variant();
        $combination3->setCode(7);
        $combination3->setParameterOption($parameterOption5);
        $manager->persist($combination3);

        $manager->flush();
    }
}
