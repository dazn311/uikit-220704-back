CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       name VARCHAR(100) NOT NULL,
                       password VARCHAR(100) NOT NULL,
                       createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       remember_me VARCHAR(255),
                       avatar VARCHAR(255) DEFAULT '/uploads/avatar.png',
                       role INT default 0
);

INSERT INTO
    users (`id`, `email`, `name`, `password`,`createDate`,`remember_me`, `avatar`, `role`)
VALUES (null,'Krampsup@gmail.com','Kramp','12345',NOW(),'1','/uploads/avatar.png' ,0),
       (null,'daz@gmail.com','Dazn311','12345',NOW(),'1','/uploads/avatar.png' ,1),
       (null,'alex2505@bk.ru','Alex','$2y$10$mKa0eFlj229qrIRURXznj.m6fjQC5w.HZu.HRjmB5Q5m/t1xDWLhK',NOW(),'1','/uploads/avatar.png' ,1);
