create table admin_cred
(
    sr_no    int auto_increment
        primary key,
    email    varchar(150) not null,
    password varchar(150) not null
);

create table booking
(
    id             bigint unsigned auto_increment
        primary key,
    guest_id       int                                   null,
    room_id        int                                   null,
    check_in_date  date                                  null,
    check_out_date date                                  null,
    total_price    decimal(10, 2)                        null,
    status boolean default 1 null,
    created_at     timestamp   default CURRENT_TIMESTAMP not null
);

create table carousel
(
    id    int auto_increment
        primary key,
    name  varchar(255) not null,
    image varchar(255) null
);

create table contact_details
(
    sr_no   int auto_increment
        primary key,
    address varchar(50)  not null,
    gmap    varchar(100) not null,
    pn1     varchar(30)  not null,
    pn2     varchar(30)  not null,
    email   varchar(100) not null,
    fb      varchar(100) not null,
    insta   varchar(100) not null,
    tw      varchar(100) not null,
    iframe  varchar(300) not null
);

create table guest
(
    id            int auto_increment
        primary key,
    name          varchar(255) not null,
    email         varchar(255) not null,
    phone         varchar(20)  null,
    image         varchar(255) null,
    address       text         null,
    pin_code      varchar(20)  null,
    date_of_birth date         null,
    password      varchar(255) not null,
    constraint email
        unique (email)
);

create table room_facilities
(
    sr_no         int auto_increment
        primary key,
    room_id       int not null,
    facilities_id int not null
);

create table room_features
(
    sr_no       int auto_increment
        primary key,
    room_id     int not null,
    features_id int not null
);

create table room_images
(
    sr_no   int auto_increment
        primary key,
    room_id int               not null,
    image   varchar(150)      not null,
    thumb   tinyint default 0 not null
);

create table rooms
(
    id           int auto_increment
        primary key,
    name         varchar(150)      not null,
    area         int               not null,
    price        int               not null,
    quantity     int               not null,
    adult        int               not null,
    children     int               not null,
    description  varchar(350)      not null,
    status       tinyint default 1 not null,
    wifi         tinyint default 0 not null,
    television   tinyint default 0 not null,
    ac           tinyint default 0 not null,
    cctv         tinyint default 0 not null,
    dining_room  tinyint default 0 not null,
    parking_area tinyint default 0 not null,
    bedrooms     int               not null,
    bathrooms    int               not null,
    wardrobe     int               not null,
    security     tinyint default 0 not null,
    image        text              null
);

create table settings
(
    sr_no      int auto_increment
        primary key,
    site_title varchar(50)  not null,
    site_about varchar(250) not null,
    shutdown   tinyint(1)   not null
);

create table staff
(
    id            int auto_increment
        primary key,
    name          varchar(255) not null,
    email         varchar(255) not null,
    phone         varchar(20)  null,
    image         varchar(255) null,
    address       text         null,
    pin_code      varchar(20)  null,
    date_of_birth date         null,
    password      varchar(255) not null,
    constraint email
        unique (email)
);

create table team_details
(
    sr_no   int not null,
    name    int not null,
    picture int not null
);

create table testimonial
(
    id     int auto_increment
        primary key,
    name   varchar(255) not null,
    image  varchar(255) null,
    text   text         null,
    rating int          null
);

