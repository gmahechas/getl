SELECT ins.invoice_id_ref,
		(SELECT IFNULL(SUM(sub_ins.invoice_status_date_diff),0)
		 FROM invoice_status_view sub_ins
		 WHERE sub_ins.invoice_id_ref = ins.invoice_id_ref AND sub_ins.status_id NOT IN(10,11))
FROM invoice_status_view ins
WHERE ins.status_id = 1 AND ins.invoice_status_date BETWEEN "2020-06-01 00:00:00" AND "2020-06-30 23:00:00";

SELECT COUNT(DISTINCT(ins.invoice_id_ref)),
		AVG((SELECT IFNULL(SUM(sub_ins.invoice_status_date_diff),0)
		 FROM invoice_status_view sub_ins
		 WHERE sub_ins.invoice_id_ref = ins.invoice_id_ref AND sub_ins.status_id NOT IN(10,11)))
FROM invoice_status_view ins
WHERE ins.status_id = 1 AND ins.invoice_status_date BETWEEN "2020-06-01 00:00:00" AND "2020-06-30 23:00:00";