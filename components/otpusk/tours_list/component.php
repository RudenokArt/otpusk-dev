<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult = new ToursList();

/**
 * 
 */
class ToursList {

  public static function getTownByID ($city_id) {
    $src = CIBlockElement::GetList([], [
      'IBLOCK_CODE' => 'city',
      'ID' => $city_id,
    ], false, false, [
      'ID',
      'IBLOCK_ID',
      'NAME',
    ]);
    $arr = [];
    while ($item = $src->Fetch()) {
      array_push($arr, $item);
    }
    return $arr[0];
  }

  function __construct() {
    $this->section_code = $this->getSectionCode();
    if (isset($_GET['tour_id'])) {
      $this->detail_item = $this->getDetailItem();
    } else {
      $this->search_filter = $this->getSerarchFilter();
      $this->items_list = $this->getIblocksList();
    }
  }

  function getDetailItem () {
    $src = CIBlockElement::GetList([], [
      'IBLOCK_CODE' => 'tour',
      'ID' => $_GET['tour_id'],
    ], false, false, [
      'ID',
      'IBLOCK_ID',
      'NAME',
      'DETAIL_TEXT',
      'DETAIL_PICTURE',
      'PROPERTY_HD_DESC',
    ]);
    $arr = [];
    while ($item = $src->Fetch()) {
      array_push($arr, $item);
    }
    return $arr[0];
  }

  function getSerarchFilter () {
    if (isset($_GET['search']) and !empty($_GET['search'])) {
      $filter = [
        'ACTIVE' => 'Y',
        'IBLOCK_CODE' => 'tour',
        'SECTION_CODE' => $this->section_code,
        [
          "LOGIC" => "OR",
          ["NAME" => '%'.$_GET['search'].'%'],
          ["DETAIL_TEXT" => '%'.$_GET['search'].'%'],
          ["PREVIEW_TEXT" => '%'.$_GET['search'].'%'],
        ]
      ];
    } else {
      $filter = [
        'ACTIVE' => 'Y',
        'IBLOCK_CODE' => 'tour',
        'SECTION_CODE' => $this->section_code,
      ];
    }
    return $filter;
  }

  function getIblocksList () {
    $src = CIBlockElement::GetList([
      'SORT' => 'DESC',
      'ID' => 'DESC',
    ], $this->search_filter, false, false, [
      'ID',
      'IBLOCK_ID',
      'NAME',
      'PREVIEW_TEXT',
      'PREVIEW_PICTURE',
      'PROPERTY_POINT_DEPARTURE',
      'PROPERTY_TOWN',
      'PROPERTY_DEPARTURE',
      'PROPERTY_DAYS',
    ]);
    $arr = [];
    while ($item = $src->Fetch()) {
      array_push($arr, $item);
    }
    return $arr;
  }

  function getSectionCode () {
    if (isset($_GET['tours_type'])) {
      return $_GET['tours_type'];
    } else {
      return '';
    }
  }
}


$this->IncludeComponentTemplate();
?>