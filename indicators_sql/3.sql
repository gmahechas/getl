SELECT ins.invoice_id_ref,
		(SELECT IFNULL(SUM(sub_ins.invoice_status_date_diff),0)
		 FROM invoice_status_view sub_ins
		 WHERE sub_ins.invoice_id_ref = ins.invoice_id_ref AND sub_ins.status_id NOT IN(10,11)) AS avg_payee
FROM invoice_status_view ins
WHERE ins.status_id = 10 AND ins.invoice_status_date BETWEEN "2020-07-01 00:00:00" AND "2020-07-31 23:00:00"
HAVING avg_payee > 30