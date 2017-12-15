SELECT count(*) FROM `usm-jujitso`.comp_candidats;
where can_clef like "2%";

SELECT * FROM `usm-jujitso`.comp_candidats
where can_clef like "-%";

call getAvailableGroup(4, 'H', 34, 100, 10, 10, 8);

select * from comp_poules where id = 1209;
select * from comp_affectations where aff_idpoule = 1209;
select * from comp_affectations where aff_idcandidat = 134;

SELECT aff_idpoule, count(can_nom) as nbelem from (
			SELECT aff_idpoule, can_nom
			FROM `usm-jujitso`.comp_affectations a
			INNER JOIN comp_candidats c on a.aff_idcandidat = c.id
			INNER JOIN comp_poules p on a.aff_idpoule = p.id
			WHERE can_clef like concat(4,'%')
			AND can_sexe = 'H'
			AND pou_poidsmin <= 34 AND (34 - pou_poidsmin <= 100) AND (34 - pou_poidsmin >= 0)
		) AS T GROUP BY aff_idpoule HAVING nbelem < 4;
        
SELECT aff_idpoule, can_nom
			FROM `usm-jujitso`.comp_affectations a
			INNER JOIN comp_candidats c on a.aff_idcandidat = c.id
			INNER JOIN comp_poules p on a.aff_idpoule = p.id
			WHERE can_clef like concat(4,'%')
			AND can_sexe = 'F'
			AND pou_poidsmin <= 34 AND (34 - pou_poidsmin <= 100) AND (34 - pou_poidsmin >= 0);
            