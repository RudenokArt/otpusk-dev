<div class="container">
	<?php foreach ($arResult->items_list as $key => $value): ?>
	<div class="row pt-20">
		<div class="col-lg-4 col-md-6 col-sm-6">
			<img src="<?php echo CFile::GetFileArray($value['PREVIEW_PICTURE'])['SRC'] ?>" alt="<?php echo $value['NAME']; ?>">
		</div>
		<div class="col-lg-8 col-md-6 col-sm-6">
			<div class="h4">
				<?php echo $value['NAME']; ?>
			</div>
			<div class="pt-5">
				<?php echo $value['PREVIEW_TEXT'];?>
        <a href="?tour_id=<?php echo $value['ID'];?>">
          Подробнее...
        </a>
			</div>
      <div class="pt-5">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <?php echo ToursList::getTownByID($value['PROPERTY_POINT_DEPARTURE_VALUE'][0])['NAME'];?>
        ~
        <?php echo ToursList::getTownByID($value['PROPERTY_TOWN_VALUE'][0])['NAME'];?>
        || ночей: <?php echo $value['PROPERTY_DAYS_VALUE'];?>
        дней: <?php echo $value['PROPERTY_DAYS_VALUE'] + 1; ?>
      </div>
      <div class="pt-5">
        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
        <?php foreach ($value['PROPERTY_DEPARTURE_VALUE'] as $key1 => $value1): ?>
          | <?php echo $value1;?>
        <?php endforeach ?>
      </div>
			<?php $order_tour = $value ?>
			<?php include 'order-button.php';?>
		</div>
	</div>
<?php endforeach ?>
</div>

<hr>
<pre><?php print_r($arResult->items_list); ?></pre>