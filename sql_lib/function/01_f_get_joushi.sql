DELIMITER $$
DROP FUNCTION IF EXISTS f_get_joushi;
CREATE  FUNCTION `f_get_joushi`(user_cd SMALLINT) RETURNS smallint(6)
BEGIN
	DECLARE dp SMALLINT;
    DECLARE di SMALLINT;
    DECLARE pos TINYINT;
    DECLARE ret SMALLINT;
    
    SELECT dep_cd, div_cd, pos_cd 
    INTO dp, di, pos
    FROM users
    WHERE cd = user_cd;
        
    IF pos = 20 THEN 
		SELECT cd 
        INTO ret 
        FROM users
        WHERE pos_cd = 1
        AND taishoku_date IS NULL
        ORDER BY cd
        LIMIT 1;
	ELSEIF pos = 25 THEN 
		SELECT cd 
        INTO ret 
        FROM users
        WHERE pos_cd = 20
        AND dep_cd = dp
        AND taishoku_date IS NULL
        ORDER BY cd
        LIMIT 1;
	ELSEIF di = 0 THEN
		SELECT cd 
        INTO ret
        FROM users
        WHERE pos_cd = 20
        AND dep_cd = dp
		ORDER BY cd
        LIMIT 1;
	ELSE
		SELECT cd 
        INTO ret
        FROM users
        WHERE pos_cd = 25
        AND dep_cd = dp
        AND div_cd = di
		ORDER BY cd
        LIMIT 1;
    END IF;
	
    RETURN ret;
    
END$$
DELIMITER ;
