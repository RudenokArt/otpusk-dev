<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-6">
			<img 
			src="<?php echo CFile::GetFileArray($arResult->detail_item['DETAIL_PICTURE'])['SRC'] ?>"
			alt="<?php echo $arResult->detail_item['NAME'];?>">
		</div>
		<div class="col-lg-8 col-md-6 col-sm-6">
			<h1><?php echo $arResult->detail_item['NAME'];?></h1>
			<?php $order_tour = $arResult->detail_item;?>
			<?php include_once 'order-button.php'; ?>
			<div class="pt-5 mt-5">
				<?php echo $arResult->detail_item['PREVIEW_TEXT'];?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
      <?php if ($arResult->detail_item['DETAIL_TEXT']): ?>
        <?php echo $arResult->detail_item['DETAIL_TEXT'];?>
      <?php else: ?>
        <?php echo $arResult->detail_item['PROPERTY_HD_DESC_VALUE']['TEXT'];?>
      <?php endif ?>
    </div>
  </div>
  <pre><?php print_r($arResult); ?></pre>
</div>
