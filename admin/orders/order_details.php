<?php

session_start();
require_once '../../src/function.php';
need_install();
if (!user_is_admin()) header('Location: /');

require '../../public/navbar_admin_p.php';
html_header('Administration');

if (isset($_GET, $_GET['id'])) {
    $order = orders_from_id($_GET['id']);
    $cart = $order['cart'];

    ?>
    <h4>Commande : <?php echo $order['id']; ?></h4>
    <h5>Date : <?php echo $order['date']; ?></h5>
    <table style="width:75%">
        <tr>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Couleur</th>
            <th>Image</th>
            <th></th>
        </tr>
        <?php foreach ($cart as $line) { ?>
            <tr>
                <td><?php ;
                    echo articles_from_id($line['id'])['name'] ?></td>
                <td><?php echo $line['quantity'] ?></td>
                <td><?php echo number_format($line['price'], 0, ".", " ") . " " . config()['currency'] ?></td>
                <td><?php if (!empty($line['color'])) echo $line['color']; ?></td>
                <td>
                    <img style="width: 50px" src="<?php echo articles_from_id($line['id'])['img']; ?>">
                </td>
                <td>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="5">Total</td>
            <td
            ""><?php echo number_format($order['total'], 0, ".", " ") . " " . config()['currency'] ?> </td>
        </tr>
    </table>

    <br>
<?php } ?>

