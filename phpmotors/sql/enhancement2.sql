--Query 1
INSERT INTO clients (clientFirstname, clientLastname, clientEmail, clientPassword, comment) 
VALUES ("Tony", "Stark", "tony@starkent.com", "Iam1ronM@n", "I am the real Ironman");

--Query 2
UPDATE clients
SET clientLevel = 3
WHERE clientFirstname = "Tony" AND clientLastname = "Stark";

--Query 3
UPDATE inventory
SET invDescription = replace(invDescription, "small interiors", "spacious interior")
WHERE invMake = "GM" AND invModel = "Hummer";