CREATE TABLE country (country VARCHAR(45) NULL , points INT NOT NULL );
ALTER TABLE country ADD PRIMARY KEY(country);

CREATE TABLE people ( name VARCHAR(45) NULL , password VARCHAR(20) NOT NULL );
ALTER TABLE people ADD PRIMARY KEY(name);

INSERT INTO `country`(`country`,`final`) VALUES ("Ablania", 0),("Armenia",1), ("Australia",1), ("Austria",1) ,("Azerbaijan",1), ("Belarus",1),("Belgium",1), ("Bulgaria",1), ("Croatia",1), ("Cyprus",1), ("Czech Republic",0), ("Denmark",1), ("Estonia",0), ("Finland",0), ("France",1), ("Germany",1), ("Georgia",0), ("Greece",1), ("Hungary",1), ("Iceland",0), ("Ireland",0), ("Israel", 1), ("Italy",1),("Latvia",0), ("Lithuania",0), ("F.Y.R. Macedonia",0), ("Malta",0), ("Moldova",1), ("Montenegro",0), ("The Netherlands",0), ("Norway",1), ("Poland",1), ("Portugal",1), ("Romania",0), ("Russia",0), ("San Marino",0), ("Serbia",0), ("Slovenia",0), ("Spain",1), ("Sweden",1), ("Switzerland",0), ("Ukraine",1), ("United Kingdom",1);
INSERT INTO `people`(`name`, `password`, `admin`) VALUES ("Chris","",1);