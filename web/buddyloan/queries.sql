-- View balance --
CREATE VIEW buddyloan.balance AS
select b.userid, b.buddyid, coalesce(c.total,0) credit, coalesce(d.total,0) debt, (coalesce(c.total,0) - coalesce(d.total,0)) balance from buddyloan.buddies b 
LEFT JOIN
(
  select userid, buddyid,  sum(amount) total from buddyloan.transactions group by userid, buddyid
) c
on b.userid = c.userid and b.buddyid = c.buddyid 

LEFT JOIN
(
  select userid, buddyid,  sum(amount) total from buddyloan.transactions group by userid, buddyid
) d
on b.userid = d.buddyid and b.buddyid = d.userid;

----
SELECT b.id, b.userid, b.buddyid, u.firstname, u.lastname, u.pin, u.phone, u.email, r.balance 
  FROM buddyloan.buddies b 
  left JOIN buddyloan.users u ON b.buddyid = u.userid
  left JOIN buddyloan.balance r on b.userid = r.userid
  and b.buddyid = r.buddyid 
  WHERE b.userid = 1;

  