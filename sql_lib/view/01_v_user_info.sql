DROP VIEW IF EXISTS v_user_info;
CREATE VIEW v_user_info AS
SELECT  
u.cd user_cd,
concat(sei ,'　', mei) user_name,
dp.cd dep_cd,
dp.name dep_name,
di.cd div_cd,
di.name div_name,
concat(dp.name ,'　', di.name) dep_div_name
FROM users u
LEFT JOIN departments dp
ON u.dep_cd = dp.cd
LEFT JOIN divisions di
ON u.div_cd = di.cd
;