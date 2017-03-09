<?php

class AdminOrderController extends Admin
{
    
    public function actionIndex()
    {
        self::isAdmin();
        $orders = Order::getOrders();
        require_once(ROOT.'/views/admin/orders/index.php');
    }
    
    public function actionView($id)
    {
        self::isAdmin();
        
        $order = Order::getOrder($id);
        
        $quantity = json_decode($order['products'], true);
        $prodsId = array_keys($quantity);
        $products = Product::getSelectedId($prodsId);
        require_once(ROOT.'/views/admin/orders/view.php');
    }
	
	public function actionUpdate($id)
	{
		self::isAdmin();
		$order = Order::getOrder($id);

		if (isset($_POST['submit'])) {
			$userName = $_POST['userName'];
			$userPhone = $_POST['userPhone'];
			$userAddres = $_POST['addres'];
			$date = $_POST['date'];
			$status = $_POST['status'];

			Order::updateOrder($id, $userName, $userPhone, $userAddres, $date, $status);
			header("Location: /admin/order/view/$id");
        }
		
		require_once(ROOT.'/views/admin/orders/update.php');
	}
	
	
	public function actionDelite($id)
	{
		self::isAdmin();
		$order = Order::getOrder($id);
		if (isset($_POST['submit']))
		{
			Order::Delite($id);
			header("Location: /admin/orders/");
		}
		
		require_once(ROOT.'/views/admin/orders/delite.php');
		
	}
}