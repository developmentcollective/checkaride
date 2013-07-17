
create table log (
    `id` int NOT NULL auto_increment,
    `city_id` int NOT NULL,
    `mobile_number` varchar (50),
    `search_method` varchar (50) NOT NULL,                      /* this is the method name used in the cab controler */
    `format` varchar (50),                                      /* the format that the response is requested in */
    `vehicle_registration_number` varchar(200) default NULL,    /* nyc:'T415666C' - in nyc DMV License Plate*/
    `latitude`  DECIMAL(7,4),                                   /* longditude and latitude of the request */
    `longitude`  DECIMAL(7,4),
    `result` varchar (50),                                      /* the result we serveed to the customer */
    `created` timestamp default now(),                          /* date the row was created */
    PRIMARY KEY  (`id`)
);
