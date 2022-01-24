CREATE TABLE client_notification (id INTEGER PRIMARY KEY, user_id INTEGER NOT NULL, message TEXT NOT NULL, date INTEGER NOT NULL, status INTEGER NOT NULL);

CREATE TABLE seller_notification (id INTEGER PRIMARY KEY, user_id INTEGER NOT NULL, message TEXT NOT NULL, date INTEGER NOT NULL, status INTEGER NOT NULL);

ALTER TABLE `client_notification`
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD CONSTRAINT `client_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `clients` (`id_client`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `seller_notification`
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT,
  ADD CONSTRAINT `seller_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sellers` (`id_seller`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;