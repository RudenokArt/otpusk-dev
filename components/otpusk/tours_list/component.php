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
    } elseif (isset($_GET['tours_type'])) {
      $this->search_filter = $this->getSerarchFilter();
      $this->items_list = $this->getIblocksList();
      $this->country_list = $this->getContryList();
      $this->towns_list = $this->getTownsList();
    }
  }

  function getTownsList () {
    $src = CIBlockElement::GetList([], [
      'IBLOCK_CODE' => 'city',
    ], false, false, [
      'ID',
      'IBLOCK_ID',
      'NAME',
    ]);
    $arr = [];
    while ($item = $src->Fetch()) {
      array_push($arr, $item);
    }
    return $arr;
  }

  function getContryList () {
    $src = CIBlockElement::GetList([], [
      'IBLOCK_CODE' => 'country',
    ], false, false, [
      'ID',
      'IBLOCK_ID',
      'NAME',
    ]);
    $arr = [];
    while ($item = $src->Fetch()) {
      array_push($arr, $item);
    }
    return $arr;
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
      'PREVIEW_TEXT',
      'DETAIL_PICTURE',
      'PROPERTY_HD_DESC',
      'PROPERTY_PICTURES',
      'PROPERTY_POINT_DEPARTURE',
      'PROPERTY_TOWN',
      'PROPERTY_DEPARTURE',
      'PROPERTY_DAYS',
      'PROPERTY_PRICE_INCLUDE',
      'PROPERTY_PRICE_NO_INCLUDE',
      'PROPERTY_NDAYS',
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
          ["PROPERTY_HD_DESC" => '%'.$_GET['search'].'%'],
        ]
      ];
    } else {
      $filter = [
        'ACTIVE' => 'Y',
        'IBLOCK_CODE' => 'tour',
        'SECTION_CODE' => $this->section_code,
      ];
    }
    if (isset($_GET['country']) and !empty($_GET['country'])) {
      $filter['PROPERTY_COUNTRY'] = $_GET['country'];
    }
    if ($_GET['nights_from']) {
      $filter['>=PROPERTY_DURATION_DAYS'] = $_GET['nights_from'];
    }
    if ($_GET['nights_to']) {
      $filter['<=PROPERTY_DURATION_DAYS'] = $_GET['nights_to'];
    }
    if ($_GET['town_from']) {
      $filter['PROPERTY_POINT_DEPARTURE'] = $_GET['town_from'];
    }
    if ($_GET['town_to']) {
      $filter['PROPERTY_TOWN'] = $_GET['town_to'];
    }
    // if ($_GET['date_from']) {
    //   $filter['PROPERTY_DEPARTURE'] = $_GET['date_from'];
    // }
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
      'PROPERTY_COUNTRY',
      'PROPERTY_DURATION_DAYS',
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