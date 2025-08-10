CREATE TABLE documents (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       type VARCHAR(10) NOT NULL,
                       idDoc VARCHAR(10) NOT NULL,
                       mode VARCHAR(10) NOT NULL,
                       createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       userId INT default 0,
                       fileName VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO
    documents (`id`, `type`, `idDoc`, `mode`,`createDate`,`userId`,`fileName`)
VALUES (
     null,
     'invrpt',
     'new',
     'edit',
     NOW(),
     '0',
     'invrpt-new-edit-Krampsup-250807.json'),
    (
     null,
     'invrpt',
     '1248923',
     'edit',
     NOW(),
     '0',
     'invrpt1248923-edit-Krampsup-250213.json'),
       (
     null,
     'desadv',
     '1248304',
     'edit',
     NOW(),
     '0' ,
     'desadv1248304-edit-Krampsup-250804.json');
