SELECT `name` FROM `distrib`
WHERE `id_distrib` IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90)
OR LOWER(`name`) REGEXP '^[^y]*y[^y]*y[^y]*$'
LIMIT 2, 5;

SELECT `name` FROM `distrib`
WHERE `id_distrib` IN (42, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90)
OR (CHAR_LENGTH(`name`) - CHAR_LENGTH(REPLACE(LOWER(`name`), "y", "")) = 2)
LIMIT 2, 5;
