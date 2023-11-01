DELIMITER $$

CREATE TRIGGER generate_ticket_id BEFORE INSERT
ON tickets FOR EACH ROW BEGIN DECLARE next_ticket_id INT;

SET next_ticket_id = 1;

SELECT  IFNULL(MAX(id_ticket % 1000000),0) + 1 INTO next_ticket_id
FROM tickets
WHERE YEAR(fecha) = YEAR(NOW())
AND MONTH(fecha) = MONTH(NOW());

SET NEW.id_ticket = CONCAT(YEAR(NOW()), LPAD(MONTH(NOW()), 2, '0'), LPAD(DAY(NOW()), 2, '0'), LPAD(next_ticket_id, 6, '0')); END; 
$$ DELIMITER;

