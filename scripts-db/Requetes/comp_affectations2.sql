SET SQL_SAFE_UPDATES = 0;
delete from `usm-jujitso`.comp_affectations;
delete from `usm-jujitso`.comp_poules;


select aff_idpoule, count(aff_idpoule)  as nbelem from (
	select aff_idpoule from comp_affectations
) as T group by aff_idpoule;


select * from comp_affectations where aff_idcandidat = 134;
select * from comp_affectations where aff_idpoule = 1258;

SELECT a.id,  aff_idpoule, aff_idcandidat, can_nom, can_prenom, can_sexe, can_poids, can_idclub, can_clef
FROM `usm-jujitso`.comp_affectations a
inner join comp_candidats c on a.aff_idcandidat = c.id
order by aff_idpoule;

delete from `usm-jujitso`.comp_affectations where aff_idcandidat not in (4, 5, 6, 7);
delete from `usm-jujitso`.comp_poules where id <> 365;


select count(*) from `usm-jujitso`.comp_affectations;

SELECT a.id,  aff_idpoule, pou_poidsmin, aff_idcandidat, can_nom, can_prenom, can_sexe, can_poids, can_idclub, can_clef
FROM `usm-jujitso`.comp_affectations a
inner join comp_candidats c on a.aff_idcandidat = c.id
inner join comp_poules p on a.aff_idpoule = p.id
where can_clef like '2%'
and can_sexe = 'F'
and pou_poidsmin <= 20 and (20 - pou_poidsmin <= 4) and (20 - pou_poidsmin >= 0);



select aff_idpoule, can_idclub, count(can_idclub) as nbelem from (
	SELECT aff_idpoule, can_idclub
	FROM `usm-jujitso`.comp_affectations a
	inner join comp_candidats c on a.aff_idcandidat = c.id
	inner join comp_poules p on a.aff_idpoule = p.id
	where can_clef like '2%'
	and can_sexe = 'F'
	and pou_poidsmin <= 20 and (20 - pou_poidsmin <= 4) and (20 - pou_poidsmin >= 0)
) as T group by aff_idpoule, can_idclub having nbelem < 3 and can_idclub = 3;