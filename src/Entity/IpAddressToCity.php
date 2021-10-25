<?php

/**
 * select *
from `ip_address_to_city_12-2015` city
join (
select end_ip_long
from `ip_address_to_city_12-2015`
where end_ip_long >= inet_aton('178.222.17.78')
limit 1
) d
where city.start_ip_long <= inet_aton('178.222.17.78')
and city.end_ip_long in (
d.end_ip_long
#select end_ip_long
#from `ip_address_to_city_12-2015`
#where end_ip_long >= inet_aton('178.222.17.78')
)
limit 1;
 */