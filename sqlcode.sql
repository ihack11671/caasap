CREATE TABLE corporates (
    id INT AUTO_INCREMENT,
    c_name VARCHAR(255) NOT NULL,
    c_location VARCHAR(255) NOT NULL,
    crn_brn_no VARCHAR(255) NOT NULL,
    c_email VARCHAR(255) NOT NULL,
    password TEXT NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (crn_brn_no),
    UNIQUE (c_email)
);
