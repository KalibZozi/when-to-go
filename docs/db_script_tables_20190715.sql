create table devices
(
	id int auto_increment,
	serial_no varchar(100) default 'NO_SERIAL' not null,
	created datetime default NOW() not null,
	status varchar(50) default 'DEACTIVATED' not null,
	user_id int null,
	constraint devices_pk
		primary key (id),
	constraint devices_users_id_fk
		foreign key (user_id) references users (id)
);

create unique index devices_serial_no_uindex
	on devices (serial_no);

----

create table displays
(
	id int auto_increment,
	device_id int null,
	line_no int null,
	stop_id varchar(50) null,
	route_id varchar(50) null,
	direction int null,
	headsign varchar(200) null,
	constraint displays_pk
		primary key (id),
	constraint displays_devices_id_fk
		foreign key (device_id) references devices (id),
	constraint displays_routes_route_id_fk
		foreign key (route_id) references routes (route_id),
	constraint displays_stops_stop_id_fk
		foreign key (stop_id) references stops (stop_id)
);

create index displays_device_id_index
	on displays (device_id);

alter table displays
	add created datetime default NOW() not null;

alter table displays
	add modified datetime null;

alter table displays
	add active int default 0 not null;


----

create table master_data
(
	id int auto_increment,
	`key` varchar(100) default 'NO_KEY' not null,
	value varchar(200) null,
	constraint master_data_pk
		primary key (id)
);

create unique index master_data_key_uindex
	on master_data (`key`);

alter table master_data
	add created datetime default NOW() not null;

alter table master_data
	add modified datetime null;

