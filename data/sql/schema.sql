CREATE TABLE bid (id BIGINT AUTO_INCREMENT, task_id BIGINT NOT NULL, bidder_id BIGINT NOT NULL, price BIGINT, status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX task_id_idx (task_id), INDEX bidder_id_idx (bidder_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE feedback (id BIGINT AUTO_INCREMENT, receiver_id BIGINT NOT NULL, provider_id BIGINT NOT NULL, score BIGINT NOT NULL, message TEXT NOT NULL, task_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX receiver_id_idx (receiver_id), INDEX provider_id_idx (provider_id), INDEX task_id_idx (task_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE suburb (id BIGINT AUTO_INCREMENT, postcode VARCHAR(15) NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE task (id BIGINT AUTO_INCREMENT, creator_id BIGINT NOT NULL, city VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, completion_date datetime, reserve_price BIGINT NOT NULL, payment VARCHAR(255) NOT NULL, method VARCHAR(255) NOT NULL, address VARCHAR(255), suburb VARCHAR(255), postcode VARCHAR(15), state VARCHAR(15), status VARCHAR(255) NOT NULL, winning_bid_id BIGINT, private_description TEXT, category VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX creator_id_idx (creator_id), INDEX winning_bid_id_idx (winning_bid_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, status BIGINT DEFAULT 0 NOT NULL, suburb VARCHAR(255), postcode VARCHAR(15), phone VARCHAR(31), about TEXT, twitter VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE bid ADD CONSTRAINT bid_task_id_task_id FOREIGN KEY (task_id) REFERENCES task(id);
ALTER TABLE bid ADD CONSTRAINT bid_bidder_id_sf_guard_user_id FOREIGN KEY (bidder_id) REFERENCES sf_guard_user(id);
ALTER TABLE feedback ADD CONSTRAINT feedback_task_id_task_id FOREIGN KEY (task_id) REFERENCES task(id);
ALTER TABLE feedback ADD CONSTRAINT feedback_receiver_id_sf_guard_user_id FOREIGN KEY (receiver_id) REFERENCES sf_guard_user(id);
ALTER TABLE feedback ADD CONSTRAINT feedback_provider_id_sf_guard_user_id FOREIGN KEY (provider_id) REFERENCES sf_guard_user(id);
ALTER TABLE task ADD CONSTRAINT task_winning_bid_id_bid_id FOREIGN KEY (winning_bid_id) REFERENCES bid(id);
ALTER TABLE task ADD CONSTRAINT task_creator_id_sf_guard_user_id FOREIGN KEY (creator_id) REFERENCES sf_guard_user(id);
ALTER TABLE user_profile ADD CONSTRAINT user_profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
