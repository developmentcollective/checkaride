
CREATE TABLE `city` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(200) NOT NULL,
    `country`  varchar(200) NOT NULL,
    `country_code`  char(2) NOT NULL,                       /* iso 3166 country code */
    `latitude`  DECIMAL(7,4),
    `longitude`  DECIMAL(7,4),
    `text_service` varchar(200) default NULL,               /*  */
    `license_plate_graphic` varchar(200) default NULL,      /* location of graphic */
    `search_class` varchar(50) default NULL,                /* helper class to perform searches must have a search public member*/
    `icon_graphic` varchar(200) default NULL,               /* location of graphic */
    `created` timestamp default now(),                      /* date the row was created */
    PRIMARY KEY  (`id`)
);
insert into city (
    name,
    country,
    country_code,
    latitude,
    longitude,
    text_service,
    license_plate_graphic,
    icon_graphic,
    search_class )
values (
    "London",
    "United Kingdom",
    "GB",
    51.5001,
    -0.1262,
    "64343 check",
    "/images/london_licence_plate.png",
    "/images/london.jpg",
    "LondonCabSearch");

insert into city (
    name,
    country,
    country_code,
    latitude,
    longitude,
    text_service,
    license_plate_graphic,
    icon_graphic,
    search_class )
values (
    "New York",
    "United States of America",
    "US",
    40.7833, /* 40'47" */
    73.9666, /* 73'58" */
    "",
    "/images/nyc_licence_plate.png",
    "/images/new_york.jpg",
    null);

CREATE TABLE `cab` (
    `id` int(11) NOT NULL auto_increment,
    `city_id` int,
    `import_id` int,
    `affiliated_base_license_number` varchar(200) default NULL, /* nyc:'B00013' */
    `license_number` varchar(200) default NULL,                 /* nyc:'C07586' ldn:'0208311902' PHV Licence number in London  */
    `license_expiry` varchar(200) default NULL,                 /* london:'23/08/2011'  */
    `name_of_licensee` varchar(200) default NULL,               /* nyc:'BANDUSIRI PH SUNIL' - a persons name */
    `license_type` varchar(200) default NULL,                   /* nyc:'For-Hire-Vehicle' */
    `vehicle_registration_number` varchar(200) default NULL,    /* nyc:'T415666C' - in nyc DMV License Plate*/
    `vin` varchar(200) default NULL,                            /* nyc:'1LNHM94R09G628290' */
    `vehicle_type` varchar(200) default NULL,                   /* nyc:'HYB' - hybrid , 'STR' - limo */
    `make` varchar(200) default NULL,                           /* london:'MERCEDES' */
    `model` varchar(200) default NULL,                          /* london:'E280' */
    `year` varchar(200) default NULL,                           /* */
    `created` timestamp default now(),                          /* date the row was created */
    FOREIGN KEY (city_id) REFERENCES city(id),
    PRIMARY KEY  (`id`)
);

create table import (
    `id` int(11) NOT NULL auto_increment,
    `number_of_rows` int,
    `time_to_import` int,
    `city_id` int NOT NULL,
    `created` timestamp default now(),                          /* date the row was created */
    PRIMARY KEY  (`id`)
);

CREATE TABLE nycimportcab (
    `id` int NOT NULL auto_increment,
    `city_id` int NOT NULL,
    `import_id` int NOT NULL,
    `affiliated_base_license_number` varchar(200) default NULL, /* nyc:'B00013' */
    `license_number` varchar(200) default NULL,                 /* nyc:'C07586' ldn:'0208311902' PHV Licence number in London  */
    `license_expiry` varchar(200) default NULL,                 /* london:'23/08/2011'  */
    `name_of_licensee` varchar(200) default NULL,               /* nyc:'BANDUSIRI PH SUNIL' - a persons name */
    `license_type` varchar(200) default NULL,                   /* nyc:'For-Hire-Vehicle' */
    `vehicle_registration_number` varchar(200) default NULL,    /* nyc:'T415666C' - in nyc DMV License Plate*/
    `vin` varchar(200) default NULL,                            /* nyc:'1LNHM94R09G628290' */
    `vehicle_type` varchar(200) default NULL,                   /* nyc:'HYB' - hybrid , 'STR' - limo */
    `make` varchar(200) default NULL,                           /* london:'MERCEDES' */
    `model` varchar(200) default NULL,                          /* london:'E280' */
    `year` varchar(200) default NULL,                           /* */
    `created` timestamp default now(),                          /* date the row was created */
    PRIMARY KEY  (`id`)
);
