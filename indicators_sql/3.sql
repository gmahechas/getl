SELECT COUNT(DISTINCT(ita.invoice_id_ref)) AS count_invoices, IFNULL(AVG(ita.duration), 0) AS avg_duration
FROM invoice_time_avg ita
WHERE ita.status_id = 10
AND ita.invoice_status_date BETWEEN "2020-06-01 00:00:00" AND "2020-06-30 23:00:00"
AND ita.duration > 30;