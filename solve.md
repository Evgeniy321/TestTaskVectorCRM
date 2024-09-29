1) 
SELECT
  id,
  user_id,
  date,
  SUM(amount) OVER (PARTITION BY user_id ORDER BY date, id) AS balance
FROM
  transactions
ORDER BY
  date, id;
2) функция buildTree рекурсивно прохидится по массиву, вставляя новые элементы, при нахождении дочернего объекта (пример реализации в index.php)