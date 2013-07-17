alter table cab add rating int;

create table rating (
    `id` int NOT NULL auto_increment,
    `cab_id` int NOT NULL,
    `rating` int NOT NULL,
    `email`  varchar(400) NOT NULL,
    `comment`  varchar(400),
    PRIMARY KEY  (`id`)
);


