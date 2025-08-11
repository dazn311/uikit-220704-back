CREATE TABLE users (
                       id INT(10) AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       name VARCHAR(100) NOT NULL,
                       password VARCHAR(100) NOT NULL,
                       createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       remember_me VARCHAR(255),
                       avatar VARCHAR(255) DEFAULT '/uploads/avatar.png',
                       role INT default 0
);

CREATE TABLE documents (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       type VARCHAR(10) NOT NULL,
                       idDoc VARCHAR(10) NOT NULL,
                       mode VARCHAR(10) NOT NULL,
                       createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       userId INT(10) NOT NULL,
                       fileName VARCHAR(100) NOT NULL UNIQUE,
                       FOREIGN KEY (userId) REFERENCES users(id)
);

INSERT INTO
    users (`id`, `email`, `name`, `password`,`createDate`,`remember_me`, `avatar`, `role`)
VALUES (null,'kramp@gmail.com','Kramp','12345',NOW(),'1','/uploads/avatar.png' ,0),
       (null,'daz@gmail.com','Dazn311','12345',NOW(),'1','/uploads/avatar.png' ,1),
       (null,'alex2505@bk.ru','Alex','$2y$10$mKa0eFlj229qrIRURXznj.m6fjQC5w.HZu.HRjmB5Q5m/t1xDWLhK',NOW(),'1','/uploads/avatar.png' ,1);

INSERT INTO
    documents (`id`, `type`, `idDoc`, `mode`,`createDate`,`userId`,`fileName`)
VALUES (
     null,
     'invrpt',
     'new',
     'edit',
     NOW(),
     '1',
     'invrpt-new-Kramp-250807.json'),
    (
     null,
     'invrpt',
     '1248923',
     'edit',
     NOW(),
     '1',
     'invrpt1248923-edit-Kramp-250811.json'),
       (
     null,
     'desadv',
     '1248304',
     'edit',
     NOW(),
     '1' ,
     'desadv1248304-edit-Kramp-250804.json');
