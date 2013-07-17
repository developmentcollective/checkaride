
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
    "Basingstoke",
    "United Kingdom",
    "GB",
    51.25, /* 51°15'N	01°05'W */
    1.0833,
    "898989 hopeless",
    "/images/baingstoke_licence_plate.png",
    "/images/basingstoke.jpg",
    null);

insert into import ( city_id ) values (3);

insert into cab ( city_id, import_id, affiliated_base_license_number,license_number,license_expiry,name_of_licensee,license_type,vehicle_registration_number,vin,vehicle_type,make,model,year)values (
    3,
    1,
    'B00013',
    'C07586',
    '23/08/2011',
    'Simon Elliott',
    'For-Hire-Vehicle',
    'WK04FYL',
    '1LNHM94R09G628290',
    'HYB',
    'corvette',
    'little red',
    '2010'
);

insert into cab ( city_id,import_id, affiliated_base_license_number,license_number,license_expiry,name_of_licensee,license_type,vehicle_registration_number,vin,vehicle_type,make,model,year)values (
    3,
    1,
    'B00013',
    'C07586',
    '23/08/2011',
    'Andy Greenshaw',
    'For-Hire-Vehicle',
    'GGG123',
    '1LNHM94R09G628290',
    'HYB',
    'corvette',
    'little red',
    '2010'
);

