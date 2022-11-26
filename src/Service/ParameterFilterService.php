<?php

namespace App\Service;

use App\Repository\VariantRepository;

class ParameterFilterService
{
    private VariantRepository $variantRepository;

    public function __construct(VariantRepository $variantRepository)
    {
        $this->variantRepository = $variantRepository;
    }

    public function filter(array $params): array
    {
        $variants = $this->variantRepository->findVariants($params);
        $codes = [];
        foreach ($variants as $variant) {
            $codes[] = $variant->getCode();
        }

        $groupedParameters = [];

        $parameters = $this->variantRepository->getParameters($codes);

        foreach ($parameters as $parameter) {
            $groupedParameters[$parameter['name']][] = $parameter['value'];
        }

        return $groupedParameters;
    }
}
