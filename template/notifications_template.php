<?php
    $id = $_SESSION['id'];
    if ($_SESSION['type'] == "client") {
        $notifications = $db->notifications()->getClientNotifications($id);
    } else {
        $notifications = $db->notifications()->getSellerNotifications($id);
    }
?>

<section>
    <?php foreach($notifications as $notification): ?>

    <?php
        if ($notification->getStatus() == 0){
            echo '<div class="box">';
        } else {
            echo '<div class="box new">';
        }
    ?>
        <div class="container">
            <h4><?php echo $notification->getDate() ?></h4>
        </div>
        <div class="container">
            <h3><?php echo $notification->getMessage() ?></h3>
        </div>
    </div>

    <?php
        if ($_SESSION['type'] == "client") {
            $db->notifications()->seeClientNotification($notification);
        } else {
            $db->notifications()->seeSellerNotification($notification);
        }
    ?>

    <?php endforeach; ?>
    
</section>