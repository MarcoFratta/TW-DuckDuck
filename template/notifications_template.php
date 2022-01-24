<?php
    $id = $_SESSION['id'];
    if ($_SESSION['type'] == "client") {
        $notifications = $db->notifications()->getClientNotifications($id);
    } else {
        $notifications = $db->notifications()->getSellerNotifications($id);
    }
?>
<h1>Messaggi</h1>
<section id="notifications">
    <?php foreach($notifications as $notification): ?>

        <h3><?php echo $notification->getId() ?></h3>
        <h5>Data: <?php echo $notification->getDate() ?></h5>
        <h5>Messaggio: <?php echo $notification->getMessage() ?></h5>

    <?php endforeach; ?>
</section>

<!-- el: FOOTER -->