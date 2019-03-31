CREATE TABLE `when_to_go`.`stops` ( `stop_id` INT NOT NULL , `stop_name` VARCHAR(100) NOT NULL , `stop_lat` DOUBLE NOT NULL , `stop_lon` DOUBLE NOT NULL , `stop_code` VARCHAR(50) NOT NULL , `location_type` INT NOT NULL , `parent_station` VARCHAR(50) NOT NULL , `wheelchair_boarding` INT NOT NULL , `stop_direction` INT NOT NULL , PRIMARY KEY (`stop_id`), INDEX `idx_stops_stop_id` (`stop_id`), INDEX `idx_stops_stop_name` (`stop_name`), INDEX `idx_stop_location` (`stop_lat`, `stop_lon`)) ENGINE = MyISAM;
ALTER TABLE `stops` CHANGE `stop_code` `stop_code` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `location_type` `location_type` INT(11) NULL, CHANGE `parent_station` `parent_station` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `wheelchair_boarding` `wheelchair_boarding` INT(11) NULL, CHANGE `stop_direction` `stop_direction` INT(11) NULL;
ALTER TABLE `stops` CHANGE `stop_id` `stop_id` VARCHAR(50) NOT NULL;

CREATE TABLE `when_to_go`.`routes` ( `agency_id` VARCHAR(50) NULL , `route_id` VARCHAR(50) NOT NULL , `route_short_name` VARCHAR(10) NOT NULL , `route_long_name` VARCHAR(100) NULL , `route_type` INT NULL , `route_desc` VARCHAR(100) NOT NULL , `route_color` VARCHAR(6) NULL , `route_text_color` VARCHAR(6) NULL , PRIMARY KEY (`route_id`)) ENGINE = MyISAM;

CREATE TABLE `when_to_go`.`trips` ( `route_id` VARCHAR(50) NOT NULL , `trip_id` VARCHAR(50) NOT NULL , `service_id` VARCHAR(50) NULL , `trip_headsign` VARCHAR(50) NULL , `direction_id` INT NULL , `block_id` VARCHAR(50) NULL , `shape_id` VARCHAR(10) NULL , `wheelchair_accessible` INT NULL , `bikes_allowed` INT NULL , `boarding_door` INT NULL , PRIMARY KEY (`trip_id`), INDEX `idx_trips_route_id` (`route_id`)) ENGINE = MyISAM;

ALTER TABLE trips
  ADD CONSTRAINT FK_RouteTrip
    FOREIGN KEY (route_id) REFERENCES routes(route_id);
