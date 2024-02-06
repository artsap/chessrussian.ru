<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);
?>
<div id="arrayChess">
    <h1>Имеем макссив:</h1>

    <?php if ($USER->IsAdmin()) {
        echo '<pre>';
        print_r($arResult['ARRAY']);
        echo '</pre>';
    } ?>

    <h3>Укажите число</h3>

    <form id="iForm" action="#">
        <input name="i" value="15">
        <button type="submit">Результат на php</button>
        <button id="getJs">Результат на Js</button>
    </form>

    <div id="rez" data-ar="<?= json_encode($arResult['ARRAY']) ?>"></div>
</div>