<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
</div></div></div>
<form action="" method="get">
	<div class="container pt-5 mt-5">
		<div class="row  pt-5 mt-5">
			<div class="col-lg-8 col-md-8 col-sm-8 col-sx-10">
				<input name="search" type="text" 
				class="form-control" placeholder="Поиск тура">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-sx-2">
				<button class="btn btn-primary w-100">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-md-4 col-sm-4">
				<label>
					<input required type="radio" name="tours_type"	value="combi-aviaturs">
					Сборные авиатуры
				</label>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4">
				<label>
					<input required type="radio" name="tours_type"	value="authors-tours">
					Авторские туры
				</label>
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

