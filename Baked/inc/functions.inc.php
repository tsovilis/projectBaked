<?php
function writeShoppingCart() {
	$cart = 0;
	$_SESSION['cart'] = 'cart';
	if (!$cart) {
		return '<p>U heeft geen producten in uw winkelwagen</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>U heeft <a href="cart.php">'.count($items).' product'.$s.' in uw winkelwagen</a></p>';
	}
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM books WHERE id = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td>'.$title.' by '.$author.'</td>';
			$output[] = '<td>&pound;'.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>&pound;'.($price * $qty).'</td>';
			$total += $price * $qty;
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>Grand total: <strong>&pound;'.$total.'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
?>
