SELECT DATEDIFF(MAX(`date`), MIN(`date`)) AS 'uptime' FROM member_history;
-- SELECT ABS(DATEDIFF(`release_date` , `last_projection`)) AS 'uptime' FROM `film`;