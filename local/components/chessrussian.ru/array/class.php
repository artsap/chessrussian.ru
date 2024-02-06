<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Application;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Engine\Contract\Controllerable;

class arrayClass extends CBitrixComponent implements Controllerable, Errorable
{
    protected ErrorCollection $errorCollection;

    public function getResultAction()
    {
        $request = Application::getInstance()->getContext()->getRequest()->toArray();

        $ar = $this->getArr();
        $i = (int)$request['i'];

        if ($i > 0) {
            return array_reduce($ar, function ($carry, $item) use ($i) {
                return $item <= $i? max($carry, $item): $carry;
            });
        } else {
            return 'Предпологается целое число от 1 до 100';
        }
    }

    private function getArr()
    {
        return [1, 5, 10, 15, 20, 23, 28, 34, 86, 89, 92, 99];
    }

    public function executeComponent()
    {
        $this->arResult['ARRAY'] = $this->getArr();
        $this->includeComponentTemplate();
    }

    public function configureActions(): array
    {
        return [
            'getResult' => [
                'prefilters' => [],
            ],
        ];
    }

    public function onPrepareComponentParams($arParams): array
    {
        $this->errorCollection = new ErrorCollection;
        return $arParams;
    }

    public function getErrors(): array
    {
        return $this->errorCollection->toArray();
    }

    public function getErrorByCode($code): Error
    {
        return $this->errorCollection->getErrorByCode($code);
    }

}
