<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
</div></div></div>
<form action="" method="get">
	<div class="container pt-5 mt-5 pb-5 border-bottom">
		<div class="row pt-5">
      <div class="col-lg-6 col-md-12 col-sm-12 pt-5">
        <input <?php if ($_GET['search']): ?>
          value="<?php echo $_GET['search'];?>"
        <?php endif ?> name="search" type="text" class="form-control" placeholder="Название тура">
      </div>
      <div class="col-lg-3 col-md-4 col-sm-4 pt-5">
        <select name="town_from" class="form-control">
          <option value="">Откуда...</option>
          <?php foreach ($arResult->towns_list as $key => $value): ?>
            <option <?php if ($_GET['town_from'] == $value['ID']): ?>
              selected
            <?php endif ?> value="<?php echo $value['ID'];?>"><?php echo $value['NAME'];?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-4 pt-5">
        <select name="town_to" class="form-control">
          <option value="">Куда...</option>
          <?php foreach ($arResult->towns_list as $key => $value): ?>
            <option <?php if ($_GET['town_to'] == $value['ID']): ?>
              selected
            <?php endif ?> value="<?php echo $value['ID'];?>"><?php echo $value['NAME'];?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-4 pt-5">
          Страна:
        <select name="country" class="form-control">
          <option value="">Выбрать...</option>
          <?php foreach ($arResult->country_list as $key => $value): ?>
            <option <?php if ($_GET['country'] == $value['ID']): ?>
              selected
            <?php endif ?> value="<?php echo $value['ID'];?>"><?php echo $value['NAME'];?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 pt-5">
        Дата отправления:
        <input <?php if ($_GET['date_from']): ?>
          value="<?php echo $_GET['date_from']; ?>"
        <?php endif ?> type="text" class="form-control tours_list_filter-date" name="date_from" >
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 pt-5">
        Продолжительность (ночей) от:
        <input <?php if ($_GET['nights_from']): ?>
          value="<?php echo $_GET['nights_from'] ?>"
        <?php endif ?> type="text" name="nights_from" class="form-control tours_list_filter-nights">
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 pt-5">
        Продолжительность (ночей) до:
        <input <?php if ($_GET['nights_to']): ?>
          value="<?php echo $_GET['nights_to'] ?>"
        <?php endif ?> type="text" name="nights_to" class="form-control tours_list_filter-nights">
      </div>
		</div>
    <div class="row pt-5">
      <div class="col-lg-3 col-md-6 col-sm-6 pt-5">
        <label class="pt-5">
          <input <?php if ($_GET['tours_type'] == 'combi-aviaturs'): ?>
            checked
          <?php endif ?> required type="radio" name="tours_type"  value="combi-aviaturs">
          Сборные авиатуры
        </label>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 pt-5">
        <label class="pt-5">
          <input <?php if ($_GET['tours_type'] == 'authors-tours'): ?>
            checked
          <?php endif ?> required type="radio" name="tours_type"  value="authors-tours">
          Авторские туры
        </label>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <button class="btn btn-primary w-100">
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </div>
    </div>
	</div>
</form>
<?php if (isset($_POST['order_tour'])): ?>
	<?php include_once 'order-result.php'; ?>
<?php elseif (isset($_GET['order_tour'])): ?>
	<?php include_once 'order-form.php';?>
<?php elseif (isset($_GET['tour_id'])): ?>
	<?php include_once 'detail-page.php'; ?>
<?php else: ?>
	<?php include_once 'list-page.php'; ?>
<?php endif ?>
