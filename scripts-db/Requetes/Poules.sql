call getAvailableGroup(2, 'F', 20, 3, 4, 2, 1);
call getAvailableGroup(2, 'F', 21, 3, 4, 2, 3);
call getAvailableGroup(2, 'F', 21, 3, 4, 2, 2);
call getAvailableGroup(2, 'F', 22, 3, 4, 2, 3);

call getAvailableGroup(2, 'F', 22, 3, 4, 2, 1);


SELECT aff_idpoule, count(can_nom) as nbelem from (
			SELECT aff_idpoule, can_nom
			FROM `usm-jujitso`.comp_affectations a
			INNER JOIN comp_candidats c on a.aff_idcandidat = c.id
			INNER JOIN comp_poules p on a.aff_idpoule = p.id
			WHERE can_clef like concat(2,'%')
			AND can_sexe = 'F'
			AND pou_poidsmin <= 22 AND (22 - pou_poidsmin <= 3) AND (22 - pou_poidsmin >= 0)
		) AS T GROUP BY aff_idpoule HAVING nbelem < 5 ;

SELECT aff_idpoule from (
			SELECT aff_idpoule
			FROM `usm-jujitso`.comp_affectations a
			INNER JOIN comp_candidats c on a.aff_idcandidat = c.id
			INNER JOIN comp_poules p on a.aff_idpoule = p.id
			WHERE can_clef like concat(2,'%')
			AND can_sexe = 'F'
			AND pou_poidsmin <= 22 AND (22 - pou_poidsmin <= 3) AND (22 - pou_poidsmin >= 0)
		) AS T GROUP BY aff_idpoule;
        
        
SELECT aff_idpoule, can_idclub, count(can_idclub) as nbelem from (
			SELECT aff_idpoule, can_idclub
			FROM `usm-jujitso`.comp_affectations a
			INNER JOIN comp_candidats c on a.aff_idcandidat = c.id
			INNER JOIN comp_poules p on a.aff_idpoule = p.id
			WHERE can_clef like concat(2,'%')
			AND can_sexe = 'F'
			AND pou_poidsmin <= 22 AND (22 - pou_poidsmin <= 3) AND (22 - pou_poidsmin >= 0)
		) AS T GROUP BY aff_idpoule, can_idclub HAVING nbelem < 4 ;
        
SELECT aff_idpoule, can_idclub
			FROM `usm-jujitso`.comp_affectations a
			INNER JOIN comp_candidats c on a.aff_idcandidat = c.id
			INNER JOIN comp_poules p on a.aff_idpoule = p.id
			WHERE can_clef like concat(2,'%')
			AND can_sexe = 'F'
			AND pou_poidsmin <= 22 AND (22 - pou_poidsmin <= 3) AND (22 - pou_poidsmin >= 0);
        
        
select * from listepoules;

        

SELECT Poules.id AS `Poules__id`, Poules.pou_idcateg AS `Poules__pou_idcateg`, Poules.pou_sexe AS `Poules__pou_sexe`, 
Poules.pou_poidsmin AS `Poules__pou_poidsmin`, Poules.created AS `Poules__created`, Poules.updated AS `Poules__updated` 
FROM comp_poules Poules 
LEFT JOIN comp_candidats c ON c.id = comp_affectations.aff_idcandidat 
ORDER BY pou_idcateg, pou_sexe, pou_poidsmin ASC


        
        