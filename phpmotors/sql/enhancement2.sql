--Query 1
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, comment) 
VALUES ("Tony", "Stark", "tony@starkent.com", "Iam1ronM@n", "I am the real Ironman");

--Query 2
UPDATE clients
SET clientLevel = "3"
WHERE clientFirstname = "Tony" AND clientLastname = "Stark";

--Query 3
UPDATE inventory
SET invDescription = replace(invDescription, "small interiors", "spacious interior")
WHERE invMake = "GM" AND invModel = "Hummer";

--Query 4
SELECT invId, invModel, classificationName, carclassification.classificationId
FROM inventory
INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationId = 1;

--Query 5
DELETE FROM inventory
WHERE invMake = "Jeep" AND invModel = "Wrangler";

--Query 6
UPDATE inventory
SET invImage=concat("/phpmotors",invImage), invThumbnail=concat("/phpmotors",invThumbnail);

