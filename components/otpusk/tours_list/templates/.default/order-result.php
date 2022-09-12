<?php 
/**
 * 
 */
class B24_tourOrder extends B24_class {

  function __construct() {
    $this->text = 'Новая заявка на тур: '.$_POST['tour_name'].
    '; id тура: '.$_POST['[tour_id'].
    '; Заказчик: '.$_POST['fio'].
    '; Email: '.$_POST['email'].
    '; тел.: '.$_POST['phone'];
    $this->message = self::RestApiRequest('im.message.add.json', [
      'DIALOG_ID' => 27427,
      'MESSAGE' => $this->text,
    ]);
    $this->deal = self::RestApiRequest('crm.deal.add.json', [
      'fields' => [
        'TITLE' => 'Заявка на тур: '.$_POST['tour_name'],
        'STAGE_ID' => 'C4:NEW',
        'OPENED' => 'Y',
        'ASSIGNED_BY_ID' => 27427,
        'COMMENTS' => $this->text,
        'CATEGORY_ID' => 10,
        'TYPE_ID' => 'SERVICES',   
      ],
    ]);
  }

}

?>



<div class="container pt-50 pb-50">
	<div class="alert-success text-center pt-10 pb-10 h5">
		Ваша заявка направлена менеджеру. <br> Мы свяжемся с вами.
	</div>
	<div class="alert-warning text-center pt-10 pb-10 h5">
   Ошибка отправки...
 </div>
</div>